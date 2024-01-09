<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pelanggan;

class ProdukController extends Controller
{
public function index()
{
    $rows = Produk::all();
    $pelanggans = Pelanggan::all();
    return view('produk.index', compact('rows', 'pelanggans'));
}


    public function create()
    {
         $rows = Produk::all();
  $pelanggans = Pelanggan::all();
return view('produk.create', compact('rows','pelanggans'));

    }

    public function store(Request $request)
    {
$request->validate([
    'produk_pelanggan_id' => 'required|exists:tb_pelanggan,pel_id',
    'produk_nama' => 'required|max:255',
    'kategori_produk' => 'required|max:50',
    'produk_deskripsi' => 'nullable',
    'produk_harga' => 'required|min:0',
    'produk_stok' => 'required|integer|min:0',
]);


        Produk::create([
            'produk_pelanggan_id' => $request->input('produk_pelanggan_id'),
            'produk_nama' => $request->input('produk_nama'),
            'kategori_produk' => $request->input('kategori_produk'),
            'produk_deskripsi' => $request->input('produk_deskripsi'),
            'produk_harga' => $request->input('produk_harga'),
            'produk_stok' => $request->input('produk_stok'),
        ]);

        return redirect('produk');
    }

    public function show($id)
    {
        $row = Produk::findOrFail($id);

        return view('produk.detail', compact('row'));
    }

    public function edit($id)
    {
        $row = Produk::findOrFail($id);
        return view('produk.edit', compact('row'));
    }

    public function update(Request $request, $id)
    {
  $request->validate([
    'produk_pelanggan_id' => 'required|exists:tb_pelanggan,pel_id',
    'produk_nama' => 'required|max:255',
    'kategori_produk' => 'required|max:50',
    'produk_deskripsi' => 'nullable',
    'produk_harga' => 'required|min:0',
    'produk_stok' => 'required|integer|min:0',
]);


        $row = Produk::findOrFail($id);
        $row->update([
            'produk_pelanggan_id' => $request->input('produk_pelanggan_id'),
            'produk_nama' => $request->input('produk_nama'),
            'kategori_produk' => $request->input('kategori_produk'),
            'produk_deskripsi' => $request->input('produk_deskripsi'),
            'produk_harga' => $request->input('produk_harga'),
            'produk_stok' => $request->input('produk_stok'),
        ]);

        return redirect('produk');
    }

    public function destroy($id)
    {
        $row = Produk::find($id);
        $row->delete();

        return redirect('produk');
    }
}
