<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil user yang login
        $user = Auth::user();
        
        // Statistik
        $totalMenu = Menu::count();
        $totalMakanan = Menu::where('kategori', 'makanan')->count();
        $totalMinuman = Menu::where('kategori', 'minuman')->count();
        $totalDessert = Menu::where('kategori', 'dessert')->count();
        $totalTersedia = Menu::where('tersedia', true)->count();
        $totalHabis = Menu::where('tersedia', false)->count();
        
        // Menu terbaru
        $menusTerbaru = Menu::latest()->take(5)->get();
        
        // Menu termahal & termurah
        $menuTermahal = Menu::orderBy('harga', 'desc')->first();
        $menuTermurah = Menu::orderBy('harga', 'asc')->first();
        
        return view('dashboard', compact(
            'totalMenu',
            'totalMakanan',
            'totalMinuman',
            'totalDessert',
            'totalTersedia',
            'totalHabis',
            'menusTerbaru',
            'menuTermahal',
            'menuTermurah',
            'user'
        ));
    }
}