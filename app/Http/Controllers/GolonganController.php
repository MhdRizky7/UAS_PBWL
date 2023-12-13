<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             $rows = Golongan::all();
        return view('golongan.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('golongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'gol_kode' => 'required|max:10|unique:tb_golongan,gol_kode',
            'gol_nama' => 'required|max:50',
        ]);

        // Simpan data ke dalam tabel tb_golongan
        Golongan::create([
            'gol_kode' => $request->input('gol_kode'),
            'gol_nama' => $request->input('gol_nama'),
        ]);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect('golongan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Golongan::find($id);

    return view('golongan.detail', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
               $row = Golongan::findOrFail($id);
        return view('golongan.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'gol_kode' => 'bail|required',
            'gol_nama' => 'required',
        ]);

        $row = Golongan::findOrFail($id);
        $row->update([
            'gol_kode' => $request->gol_kode,
            'gol_nama' => $request->gol_nama,
        ]);

        return redirect('golongan');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Golongan::find($id);
        $row->delete();

        return redirect('golongan');
    }
}
