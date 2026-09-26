@extends('layouts.app')

@section('title', 'Buat Pesanan')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 style="font-family: 'Playfair Display', serif;">
                <i class="bi bi-cart-plus" style="color: #c8a87c;"></i> 
                <span style="color: #c8a87c;">Buat</span> Pesanan
            </h1>
            <p style="color: rgba(255,255,255,0.3); font-weight: 300;">Pilih menu favorit Anda</p>
        </div>
        <a href="{{ route('orders.index') }}" class="btn" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 50px; padding: 10px 25px;">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    @php
        $menus = App\Models\Menu::where('tersedia', true)->get();
    @endphp

    @if($menus->isEmpty())
        <div class="text-center py-5" style="background: rgba(255,255,255,0.02); border-radius: 20px; border: 1px solid rgba(255,255,255,0.05);">
            <i class="bi bi-exclamation-triangle" style="font-size: 48px; color: rgba(200,168,124,0.3);"></i>
            <h4 style="color: rgba(255,255,255,0.5); margin-top: 15px;">Belum Ada Menu Tersedia</h4>
            <p style="color: rgba(255,255,255,0.3);">Silakan cek kembali nanti</p>
            <a href="{{ route('customer.index') }}" class="btn" style="background: #c8a87c; color: #0a0a0a; border-radius: 50px; padding: 12px 30px; margin-top: 15px;">
                <i class="bi bi-eye"></i> Lihat Menu
            </a>
        </div>
    @else
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            
            <div class="row">
                @foreach($menus as $menu)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; overflow: hidden; transition: all 0.3s; height: 100%;">
                            @if($menu->gambar)
                                <img src="{{ asset($menu->gambar) }}" class="card-img-top" style="height: 160px; object-fit: cover;">
                            @else
                                <div style="height: 160px; background: rgba(255,255,255,0.03); display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-image" style="font-size: 40px; color: rgba(255,255,255,0.1);"></i>
                                </div>
                            @endif
                            <div class="card-body" style="padding: 15px;">
                                <h6 style="color: #fff; font-weight: 600; margin-bottom: 4px;">{{ $menu->nama }}</h6>
                                <p style="color: #c8a87c; font-weight: 600; font-size: 16px;">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                                <div class="input-group">
                                    <input type="hidden" name="items[{{ $loop->index }}][menu_id]" value="{{ $menu->id }}">
                                    <input type="number" 
                                           name="items[{{ $loop->index }}][quantity]" 
                                           class="form-control" 
                                           style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08); color: #fff; border-radius: 12px; padding: 8px 12px;"
                                           value="0" 
                                           min="0"
                                           placeholder="Qty">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 25px;">
                <div class="row">
                    <div class="col-md-8">
                        <label style="color: rgba(255,255,255,0.5); font-size: 14px; margin-bottom: 8px;">
                            <i class="bi bi-chat"></i> Catatan
                        </label>
                        <textarea name="notes" class="form-control" rows="2" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08); color: #fff; border-radius: 12px; padding: 12px 16px;" placeholder="Catatan khusus untuk pesanan..."></textarea>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn w-100" style="background: #c8a87c; color: #0a0a0a; border-radius: 12px; padding: 14px; font-weight: 600;">
                            <i class="bi bi-check-circle"></i> Buat Pesanan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @endif
</div>
@endsection