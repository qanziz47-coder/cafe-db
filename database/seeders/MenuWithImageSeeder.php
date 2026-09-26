<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuWithImageSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            [
                'nama' => 'Cappuccino',
                'kategori' => 'minuman',
                'deskripsi' => 'Kopi dengan busa susu yang lembut dan creamy, disajikan dengan latte art cantik',
                'harga' => 25000,
                'tersedia' => true,
                'gambar' => 'https://images.unsplash.com/photo-1534778101976-62847782c213?w=400'
            ],
            [
                'nama' => 'Espresso',
                'kategori' => 'minuman',
                'deskripsi' => 'Kopi hitam pekat dengan aroma yang kuat dan rasa bold yang autentik',
                'harga' => 18000,
                'tersedia' => true,
                'gambar' => 'https://images.unsplash.com/photo-1510591509098-f4fdc6d0ff04?w=400'
            ],
            [
                'nama' => 'Matcha Latte',
                'kategori' => 'minuman',
                'deskripsi' => 'Minuman hijau yang menyegarkan dengan rasa matcha premium dan susu segar',
                'harga' => 28000,
                'tersedia' => true,
                'gambar' => 'https://images.unsplash.com/photo-1512365670447-2bc9d07a9a9c?w=400'
            ],
            [
                'nama' => 'Nasi Goreng Spesial',
                'kategori' => 'makanan',
                'deskripsi' => 'Nasi goreng dengan telur mata sapi, ayam suwir, dan kerupuk yang renyah',
                'harga' => 35000,
                'tersedia' => true,
                'gambar' => 'https://images.unsplash.com/photo-1633945274405-b6c1ac56b9eb?w=400'
            ],
            [
                'nama' => 'Mie Ayam',
                'kategori' => 'makanan',
                'deskripsi' => 'Mie kenyal dengan ayam cincang berbumbu, pangsit goreng, dan kuah kaldu',
                'harga' => 28000,
                'tersedia' => true,
                'gambar' => 'https://images.unsplash.com/photo-1585032226651-759b368d7246?w=400'
            ],
            [
                'nama' => 'Cheesecake',
                'kategori' => 'dessert',
                'deskripsi' => 'Kue keju lembut dengan tekstur creamy dan topping stroberi segar',
                'harga' => 30000,
                'tersedia' => true,
                'gambar' => 'https://images.unsplash.com/photo-1524351199670-79a6f2753be6?w=400'
            ],
            [
                'nama' => 'Chocolate Brownies',
                'kategori' => 'dessert',
                'deskripsi' => 'Brownies coklat dengan topping kacang mede dan saus coklat leleh',
                'harga' => 25000,
                'tersedia' => false,
                'gambar' => 'https://images.unsplash.com/photo-1606313564200-e75d5e30476c?w=400'
            ],
            [
                'nama' => 'Ice Cream',
                'kategori' => 'dessert',
                'deskripsi' => 'Es krim vanilla dengan topping coklat, kacang, dan wafer',
                'harga' => 20000,
                'tersedia' => true,
                'gambar' => 'https://images.unsplash.com/photo-1501443762994-82bd5dace89a?w=400'
            ],
            [
                'nama' => 'Kopi Tubruk',
                'kategori' => 'minuman',
                'deskripsi' => 'Kopi tradisional dengan ampas yang diseduh langsung dengan air panas',
                'harga' => 15000,
                'tersedia' => true,
                'gambar' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=400'
            ],
            [
                'nama' => 'Cafe Latte',
                'kategori' => 'minuman',
                'deskripsi' => 'Perpaduan sempurna antara espresso dan susu steamed dengan latte art',
                'harga' => 27000,
                'tersedia' => true,
                'gambar' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?w=400'
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}