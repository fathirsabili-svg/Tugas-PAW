<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($produk) ? 'Edit Produk' : 'Tambah Produk' }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container container-kecil">
        <h2>{{ isset($produk) ? 'Form Edit Produk' : 'Form Tambah Produk' }}</h2>

        <form method="POST" action="{{ isset($produk) ? route('produk.update', $produk->id) : route('produk.store') }}">
            @csrf
            @if (isset($produk))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk ?? '') }}">
                @error('nama_produk') <span class="error">* {{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="merek">Merek:</label>
                <input type="text" id="merek" name="merek" placeholder="Contoh: Nike" value="{{ old('merek', $produk->merek ?? '') }}">
                @error('merek') <span class="error">* {{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="kategori">Kategori:</label>
                @php $kat = old('kategori', $produk->kategori ?? ''); @endphp
                <select id="kategori" name="kategori">
                    <option value="">-- Pilih --</option>
                    <option value="pakaian" {{ $kat == 'pakaian' ? 'selected' : '' }}>Pakaian</option>
                    <option value="elektronik" {{ $kat == 'elektronik' ? 'selected' : '' }}>Elektronik</option>
                    <option value="sepatu" {{ $kat == 'sepatu' ? 'selected' : '' }}>Sepatu</option>
                    <option value="aksesoris" {{ $kat == 'aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                </select>
                @error('kategori') <span class="error">* {{ $message }}</span> @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="warna">Varian Warna (opsional):</label>
                    <input type="text" id="warna" name="warna" placeholder="Contoh: Hitam" value="{{ old('warna', $produk->warna ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="ukuran">Varian Ukuran (opsional):</label>
                    <input type="text" id="ukuran" name="ukuran" placeholder="Contoh: M / 42" value="{{ old('ukuran', $produk->ukuran ?? '') }}">
                </div>
            </div>

            <div class="form-group">
                <label for="berat">Berat (gram):</label>
                <input type="text" id="berat" name="berat" placeholder="Contoh: 250" value="{{ old('berat', $produk->berat ?? '') }}">
                @error('berat') <span class="error">* {{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="harga">Harga (Rp):</label>
                <input type="text" id="harga" name="harga" placeholder="Contoh: 150000" value="{{ old('harga', $produk->harga ?? '') }}">
                @error('harga') <span class="error">* {{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="stok">Jumlah Stok:</label>
                <input type="text" id="stok" name="stok" placeholder="Contoh: 50" value="{{ old('stok', $produk->stok ?? '') }}">
                @error('stok') <span class="error">* {{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Produk:</label>
                <textarea id="deskripsi" name="deskripsi">{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
                @error('deskripsi') <span class="error">* {{ $message }}</span> @enderror
            </div>

            <div class="button-container">
                <button type="submit">{{ isset($produk) ? 'Simpan Perubahan' : 'Simpan Produk' }}</button>
                <a href="{{ route('produk.index') }}" class="btn-tambah">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>