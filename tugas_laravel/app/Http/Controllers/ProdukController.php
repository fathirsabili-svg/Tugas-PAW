<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::orderBy('id', 'desc')->get();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required',
            'merek'       => 'required',
            'kategori'    => 'required',
            'warna'       => 'nullable',
            'ukuran'      => 'nullable',
            'berat'       => 'required|numeric',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
            'deskripsi'   => 'required',
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi',
            'merek.required'       => 'Merek wajib diisi',
            'kategori.required'    => 'Pilih kategori',
            'berat.required'       => 'Berat wajib diisi',
            'berat.numeric'        => 'Berat hanya boleh angka',
            'harga.required'       => 'Harga wajib diisi',
            'harga.numeric'        => 'Harga hanya boleh angka',
            'stok.required'        => 'Stok wajib diisi',
            'stok.numeric'         => 'Stok hanya boleh angka',
            'deskripsi.required'   => 'Deskripsi wajib diisi',
        ]);

        Produk::create($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Produk $produk)
    {
        return view('produk.form', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama_produk' => 'required',
            'merek'       => 'required',
            'kategori'    => 'required',
            'warna'       => 'nullable',
            'ukuran'      => 'nullable',
            'berat'       => 'required|numeric',
            'harga'       => 'required|numeric',
            'stok'        => 'required|numeric',
            'deskripsi'   => 'required',
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi',
            'merek.required'       => 'Merek wajib diisi',
            'kategori.required'    => 'Pilih kategori',
            'berat.required'       => 'Berat wajib diisi',
            'berat.numeric'        => 'Berat hanya boleh angka',
            'harga.required'       => 'Harga wajib diisi',
            'harga.numeric'        => 'Harga hanya boleh angka',
            'stok.required'        => 'Stok wajib diisi',
            'stok.numeric'         => 'Stok hanya boleh angka',
            'deskripsi.required'   => 'Deskripsi wajib diisi',
        ]);

        $produk->update($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}