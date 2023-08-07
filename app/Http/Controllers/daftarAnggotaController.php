<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\daftarAnggota;
use Illuminate\Support\Facades\Storage;



class DaftarAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = daftarAnggota::all();
        return view('admin.daftarAnggota.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.daftarAnggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = 'Gambar_Event'; 
        $file = $request->file('gambar');
        Storage::putFileAs($path, $file, $file->getClientOriginalName());

        daftarAnggota::create([
            'gambar' => $path . "/" . $file->getClientOriginalName(),
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'nik' => $request->nik,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'no_kta' => $request->no_kta,
            'no_str' => $request->no_str,
            'tempat_kerja_1' => $request->tempat_kerja_1,
            'alamat_tempat_kerja_1' => $request->alamat_tempat_kerja_1,
            'tempat_kerja_2' => $request->tempat_kerja_2,
            'alamat_tempat_kerja_2' => $request->alamat_tempat_kerja_2,
            'alamat_tinggal' => $request->alamat_tinggal,
        ]);

        return redirect()->route('daftarAnggota.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
