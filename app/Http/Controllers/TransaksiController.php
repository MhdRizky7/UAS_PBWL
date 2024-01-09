<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Produk;

class TransaksiController extends Controller
{
    public function index()
    {
        $rows = Transaksi::all();
         $pelanggans = Pelanggan::all();
         $produks = Produk::all();
        return view('transaksi.index', compact('rows','pelanggans','produks'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $produks = Produk::all();
        return view('transaksi.create', compact('pelanggans', 'produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'transaksi_pelanggan_id' => 'required|exists:tb_pelanggan,pel_id',
        'transaksi_produk_id' => 'required|exists:tb_produk,produk_id',
        'transaksi_jumlah' => 'required|integer|min:1',
        'transaksi_total_harga' => 'required|string|max:50',
        'transaksi_tanggal' => 'required|date',
         'status_pembayaran' => 'required|string|max:50'
        ]);

        Transaksi::create($request->all());

        return redirect('transaksi')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.detail', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pelanggans = Pelanggan::all();
        $produks = Produk::all();
        return view('transaksi.edit', compact('transaksi', 'pelanggans', 'produks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'transaksi_pelanggan_id' => 'required|exists:tb_pelanggan,pel_id',
        'transaksi_produk_id' => 'required|exists:tb_produk,produk_id',
        'transaksi_jumlah' => 'required|integer|min:1',
        'transaksi_total_harga' => 'required|string|max:50',
        'transaksi_tanggal' => 'required|date',
         'status_pembayaran' => 'required|string|max:50'
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());

        return redirect('transaksi')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect('transaksi')->with('success', 'Transaksi berhasil dihapus!');
    }
}
