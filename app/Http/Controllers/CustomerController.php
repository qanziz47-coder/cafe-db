<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $menus = Menu::where('tersedia', true)->get();
        $makanan = Menu::where('kategori', 'makanan')->where('tersedia', true)->get();
        $minuman = Menu::where('kategori', 'minuman')->where('tersedia', true)->get();
        $dessert = Menu::where('kategori', 'dessert')->where('tersedia', true)->get();
        
        return view('customer.index', compact('menus', 'makanan', 'minuman', 'dessert'));
    }
}