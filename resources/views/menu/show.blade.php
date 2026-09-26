<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3>Detail Menu</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th width="200">ID</th>
                        <td>{{ $menu->id }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $menu->nama }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>{{ ucfirst($menu->kategori) }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $menu->deskripsi ?: '-' }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge bg-{{ $menu->tersedia ? 'success' : 'danger' }}">
                                {{ $menu->tersedia ? 'Tersedia' : 'Habis' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Dibuat</th>
                        <td>{{ $menu->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                </table>

                <div class="mt-3">
                    <a href="{{ route('menu.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('menu.edit', $menu) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>