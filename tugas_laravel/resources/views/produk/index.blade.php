<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <h2>Master Admin - Katalog Produk</h2>
            <a href="{{ route('produk.create') }}" class="btn-tambah">+ Tambah Produk</a>
        </div>

        @if (session('success'))
            <div class="alert-sukses">{{ session('success') }}</div>
        @endif

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="20%">Nama Produk</th>
                        <th width="12%">Merek</th>
                        <th width="15%">Varian</th>
                        <th width="10%">Berat</th>
                        <th width="14%">Harga</th>
                        <th width="7%">Stok</th>
                        <th width="17%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $item->nama_produk }}<br>
                                <small>{{ ucfirst($item->kategori) }}</small>
                            </td>
                            <td>{{ $item->merek }}</td>
                            <td>
                                @php
                                    $varian = trim($item->warna . ' / ' . $item->ukuran, ' /');
                                @endphp
                                {{ $varian ?: '-' }}
                            </td>
                            <td>{{ $item->berat }} g</td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>
                                <a href="{{ route('produk.edit', $item->id) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="form-hapus" onsubmit="return confirm('Yakin hapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-hapus">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">Belum ada data produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>