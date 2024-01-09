<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Golongan;
use App\Models\User;

class PelangganController extends Controller
{
        protected $model; 

    public function __construct()
    {
        $this->model = new \App\Models\Pelanggan(); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Pelanggan::all();
        $gol = Golongan::all();
        return view('pelanggan.index', compact('rows', 'gol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongans = Golongan::all();

        $data = [
            "rows"       => $golongans,
        ];

        return view('pelanggan.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $request)
{

    $pelanggan = Pelanggan::create([
        'pel_no' => $request-> pel_no,
        'pel_id_gol' => $request-> pel_id_gol,
        'pel_nama' => $request-> pel_nama,
        'pel_alamat' => $request-> pel_alamat,
        'pel_hp' => $request-> pel_hp,
        'pel_ktp' => $request-> pel_ktp,
        'pel_seri' => $request-> pel_seri,
        'pel_aktif' => $request-> pel_aktif,
        'pel_id_user' => $request -> pel_id_user,
    ]);

    // Redirect kembali ke halaman indeks dengan pesan keberhasilan
    return redirect('pelanggan');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Pelanggan::findOrFail($id);

        return view('pelanggan.detail', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Pelanggan::with('golongan')->find($id);
        $golongans = Golongan::all();

        return view('pelanggan.edit', compact('row', 'golongans'));
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
$row = Pelanggan::findOrFail($id);
$row->update([
    'pel_id_gol' => $request-> pel_id_gol,
        'pel_nama' => $request-> pel_nama,
        'pel_alamat' => $request-> pel_alamat,
        'pel_hp' => $request-> pel_hp,
        'pel_ktp' => $request-> pel_ktp,
        'pel_seri' => $request-> pel_seri,
        'pel_aktif' => $request-> pel_aktif,
]);


        return redirect('pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::destroy($id);

        return redirect('pelanggan');
    }
}
