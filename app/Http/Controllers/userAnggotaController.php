<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\daftarAnggota;
use App\Models\User;
use Illuminate\Support\Facades\Storage;



class userAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('anggota.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = 'Gambar_userAnggota'; 
        $file = $request->file('gambar');
        Storage::putFileAs($path, $file, $file->getClientOriginalName());

        daftarAnggota::create([
            'user_id' =>$request->user_id,
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

        return redirect('/anggota');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = userAnggota::find($id);
        return view('admin.userAnggota.show', ['data' => $data]);
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
        $path = 'Gambar_daftarAnggota'; 
        $file = $request->file('gambar');
        Storage::putFileAs($path, $file, $file->getClientOriginalName());
    
        $data = [
            'user_id' => $request->user_id,
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
        ];
    
        // return $data;
        daftarAnggota::where('id', $id)->update($data);
        User::where('id', $request->user_id)->update(['name' => $request->nama]);
        return redirect()->route('daftarAnggota.show', $id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        userAnggota::where('id', $id)->delete();
        return redirect()->route('userAnggota.index');
    }
}
