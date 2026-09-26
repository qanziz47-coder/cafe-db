<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Halaman daftar menu
    public function index(Request $request)
    {
        $query = Menu::query();

        // Search by name
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('tersedia', $request->status == 'tersedia');
        }

        // Sorting
        $sort = $request->sort ?? 'id';
        $order = $request->order ?? 'asc';
        $query->orderBy($sort, $order);

        $menus = $query->get();
        
        return view('menu.index', compact('menus'));
    }

    // Halaman tambah menu
    public function create()
    {
        return view('menu.create');
    }

    // Simpan menu baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:makanan,minuman,dessert',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tersedia' => 'boolean'
        ]);

        $data = $request->all();

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/menu'), $namaFile);
            $data['gambar'] = 'uploads/menu/' . $namaFile;
        }

        Menu::create($data);

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil ditambahkan!');
    }

    // Detail menu
    public function show(Menu $menu)
    {
        return view('menu.show', compact('menu'));
    }

    // Halaman edit menu
    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    // Update menu
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:makanan,minuman,dessert',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tersedia' => 'boolean'
        ]);

        $data = $request->all();

        // Upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($menu->gambar && file_exists(public_path($menu->gambar))) {
                unlink(public_path($menu->gambar));
            }

            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/menu'), $namaFile);
            $data['gambar'] = 'uploads/menu/' . $namaFile;
        }

        $menu->update($data);

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil diupdate!');
    }

    // Hapus menu
    public function destroy(Menu $menu)
    {
        // Hapus gambar
        if ($menu->gambar && file_exists(public_path($menu->gambar))) {
            unlink(public_path($menu->gambar));
        }

        $menu->delete();

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil dihapus!');
    }
}