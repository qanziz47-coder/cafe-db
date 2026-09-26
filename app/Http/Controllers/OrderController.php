<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        if (Auth::user()->isAdmin() || Auth::user()->isStaff()) {
            $orders = Order::with('user')->latest()->paginate(10);
        } else {
            $orders = Order::where('user_id', Auth::id())->latest()->paginate(10);
        }
        
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new order.
     */
    public function create()
    {
        $menus = Menu::where('tersedia', true)->get();
        return view('orders.create', compact('menus'));
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.menu_id' => 'required|exists:menus,id',
            'items.*.quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string'
        ]);

        $user = Auth::user();
        $total = 0;
        $orderItems = [];

        // Hitung total dan siapkan data
        foreach ($request->items as $item) {
            if ($item['quantity'] > 0) {
                $menu = Menu::find($item['menu_id']);
                $subtotal = $menu->harga * $item['quantity'];
                $total += $subtotal;
                
                $orderItems[] = [
                    'menu_id' => $menu->id,
                    'quantity' => $item['quantity'],
                    'price' => $menu->harga
                ];
            }
        }

        // Cek apakah ada item yang dipesan
        if (empty($orderItems)) {
            return redirect()->back()->with('error', 'Pilih minimal 1 menu!');
        }

        // Buat order
        $order = Order::create([
            'user_id' => $user->id,
            'order_number' => 'ORD-' . Str::random(8) . '-' . date('Ymd'),
            'total' => $total,
            'status' => 'pending',
            'notes' => $request->notes
        ]);

        // Buat order items
        foreach ($orderItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $item['menu_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        return redirect()->route('orders.show', $order)
            ->with('success', 'Pesanan berhasil dibuat!');
    }

    /**
     * Display the specified order.
     */
    public function show(Order $order)
    {
        // Cek apakah user punya akses
        if ($order->user_id !== Auth::id() && !Auth::user()->isAdmin() && !Auth::user()->isStaff()) {
            abort(403, 'Unauthorized access');
        }
        
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit(Order $order)
    {
        // Hanya admin/staff yang bisa edit
        if (!Auth::user()->isAdmin() && !Auth::user()->isStaff()) {
            abort(403, 'Unauthorized access');
        }

        $menus = Menu::where('tersedia', true)->get();
        return view('orders.edit', compact('order', 'menus'));
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, Order $order)
    {
        // Hanya admin/staff yang bisa update
        if (!Auth::user()->isAdmin() && !Auth::user()->isStaff()) {
            abort(403, 'Unauthorized access');
        }

        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
            'notes' => 'nullable|string'
        ]);

        $order->update([
            'status' => $request->status,
            'notes' => $request->notes
        ]);

        return redirect()->route('orders.index')
            ->with('success', 'Status pesanan berhasil diupdate!');
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy(Order $order)
    {
        // Hanya admin/staff yang bisa hapus
        if (!Auth::user()->isAdmin() && !Auth::user()->isStaff()) {
            abort(403, 'Unauthorized access');
        }

        // Hapus order items terlebih dahulu
        $order->items()->delete();
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Pesanan berhasil dihapus!');
    }

    /**
     * Update order status (admin/staff only).
     */
    public function updateStatus(Request $request, Order $order)
    {
        if (!Auth::user()->isAdmin() && !Auth::user()->isStaff()) {
            abort(403, 'Unauthorized access');
        }

        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('orders.index')
            ->with('success', 'Status pesanan berhasil diupdate!');
    }

    /**
     * Update quantity of order item.
     */
    public function updateQty(Request $request, OrderItem $orderItem)
    {
        // Cek apakah order item milik user yang login
        if ($orderItem->order->user_id !== Auth::id() && !Auth::user()->isAdmin() && !Auth::user()->isStaff()) {
            abort(403, 'Unauthorized access');
        }

        // Cek apakah order masih pending
        if ($orderItem->order->status !== 'pending') {
            return redirect()->back()->with('error', 'Pesanan sudah diproses, tidak bisa mengubah jumlah!');
        }

        $quantity = (int) $request->quantity;
        
        if ($quantity < 1) {
            $orderItem->delete();
        } else {
            $orderItem->update(['quantity' => $quantity]);
        }

        // Update total order
        $order = $orderItem->order;
        $total = $order->items()->sum(DB::raw('quantity * price'));
        $order->update(['total' => $total]);

        return redirect()->back()->with('success', 'Jumlah pesanan diupdate!');
    }

    /**
     * Add item to order (for customer).
     */
    public function addItem(Menu $menu)
    {
        // Cari order yang statusnya pending untuk user ini
        $order = Order::where('user_id', Auth::id())
                      ->where('status', 'pending')
                      ->first();

        // Jika belum ada order, buat baru
        if (!$order) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'ORD-' . Str::random(8) . '-' . date('Ymd'),
                'total' => 0,
                'status' => 'pending'
            ]);
        }

        // Cek apakah item sudah ada di order
        $orderItem = OrderItem::where('order_id', $order->id)
                              ->where('menu_id', $menu->id)
                              ->first();

        if ($orderItem) {
            // Jika sudah ada, tambah quantity
            $orderItem->update(['quantity' => $orderItem->quantity + 1]);
        } else {
            // Jika belum, buat baru
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $menu->id,
                'quantity' => 1,
                'price' => $menu->harga
            ]);
        }

        // Update total order
        $total = $order->items()->sum(DB::raw('quantity * price'));
        $order->update(['total' => $total]);

        return redirect()->back()->with('success', 'Menu ditambahkan ke pesanan!');
    }

    /**
     * Remove item from order.
     */
    public function removeItem(OrderItem $orderItem)
    {
        // Cek apakah order item milik user yang login
        if ($orderItem->order->user_id !== Auth::id() && !Auth::user()->isAdmin() && !Auth::user()->isStaff()) {
            abort(403, 'Unauthorized access');
        }

        // Cek apakah order masih pending
        if ($orderItem->order->status !== 'pending') {
            return redirect()->back()->with('error', 'Pesanan sudah diproses, tidak bisa menghapus item!');
        }

        $order = $orderItem->order;
        $orderItem->delete();

        // Update total order
        $total = $order->items()->sum(DB::raw('quantity * price'));
        $order->update(['total' => $total]);

        // Jika tidak ada item lagi, hapus order
        if ($order->items()->count() == 0) {
            $order->delete();
            return redirect()->route('customer.index')->with('success', 'Pesanan kosong, order dihapus!');
        }

        return redirect()->back()->with('success', 'Item berhasil dihapus!');
    }

    /**
     * Cancel order (for customer).
     */
    public function cancel(Order $order)
    {
        // Cek apakah order milik user yang login
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        // Cek apakah order masih pending
        if ($order->status !== 'pending') {
            return redirect()->back()->with('error', 'Pesanan sudah diproses, tidak bisa dibatalkan!');
        }

        $order->update(['status' => 'cancelled']);

        return redirect()->route('orders.index')
            ->with('success', 'Pesanan berhasil dibatalkan!');
    }

    /**
     * Get order details (for AJAX/API).
     */
    public function getDetails(Order $order)
    {
        if ($order->user_id !== Auth::id() && !Auth::user()->isAdmin() && !Auth::user()->isStaff()) {
            abort(403, 'Unauthorized access');
        }

        return response()->json([
            'order' => $order,
            'items' => $order->items()->with('menu')->get(),
            'total' => $order->total
        ]);
    }

    /**
     * Get active order for current user (for AJAX/API).
     */
    public function getActive()
    {
        $order = Order::where('user_id', Auth::id())
                      ->where('status', 'pending')
                      ->with('items.menu')
                      ->first();

        return response()->json([
            'order' => $order,
            'items' => $order ? $order->items : [],
            'total' => $order ? $order->total : 0,
            'item_count' => $order ? $order->items->sum('quantity') : 0
        ]);
    }
}