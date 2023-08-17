<?php

namespace App\Http\Controllers;

use App\Models\suratKredensial;
use App\Models\suratRekomendasi;
use App\Models\suratSTR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReqSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('anggota.surat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->jenis_surat == "rekomendasi") {
            // FC KTP 
            $path_ktp = 'Rekomendasi/FC_KTP'; 
            $file_ktp = $request->file('fc_ktp');
            Storage::putFileAs($path_ktp, $file_ktp, $file_ktp->getClientOriginalName());
            // FC Ijazah 
            $path_ijazah = 'Rekomendasi/FC_IJAZAH'; 
            $file_ijazah = $request->file('fc_ijazah');
            Storage::putFileAs($path_ijazah, $file_ijazah, $file_ijazah->getClientOriginalName());
            // FC STR Lama 
            $path_str_lama = 'Rekomendasi/FC_STR_LAMA'; 
            $file_str_lama = $request->file('fc_str');
            Storage::putFileAs($path_str_lama, $file_str_lama, $file_str_lama->getClientOriginalName());
            // PASFOTO
            $path_pasfoto = 'Rekomendasi/PASFOTO'; 
            $file_pasfoto = $request->file('pasfoto');
            Storage::putFileAs($path_pasfoto, $file_pasfoto, $file_pasfoto->getClientOriginalName());
            if ($request->periode_sik == 1) {
                // SK BEKERJA
                $path_sk_bekerja = 'Rekomendasi/SK_BEKERJA'; 
                $file_sk_bekerja = $request->file('sk_bekerja');
                Storage::putFileAs($path_sk_bekerja, $file_sk_bekerja, $file_sk_bekerja->getClientOriginalName());
            }
            if ($request->periode_sik == 2) {
                // KONTRAK KERJA
                $path_kontrak_kerja = 'Rekomendasi/Kontrak_kerja'; 
                $file_kontrak_kerja = $request->file('kontrak_kerja');
                Storage::putFileAs($path_kontrak_kerja, $file_kontrak_kerja, $file_kontrak_kerja->getClientOriginalName());
            }
            // biaya administrasi
            $path_biaya = 'Rekomendasi/Biaya_adm'; 
            $file_biaya = $request->file('biaya_administrasi');
            Storage::putFileAs($path_biaya, $file_biaya, $file_biaya->getClientOriginalName());
    
            suratRekomendasi::create([
                'user_id' => Auth::user()->id,
                'fc_ktp' => $path_ktp . "/" . $file_ktp->getClientOriginalName(),
                'fc_ijazah' => $path_ijazah . "/" . $file_ijazah->getClientOriginalName(),
                'fc_str_lama' => $path_str_lama . "/" . $file_str_lama->getClientOriginalName(),
                'pasfoto' => $path_pasfoto . "/" . $file_pasfoto->getClientOriginalName(),
                'sk_bekerja' => ($request->periode_sik == 1) ? $path_sk_bekerja . "/" . $file_sk_bekerja->getClientOriginalName() : null,
                'sk_kontrak_kerja' => ($request->periode_sik == 2) ? $path_kontrak_kerja . "/" . $file_kontrak_kerja->getClientOriginalName() : null,
                'biaya_administrasi' => $path_biaya . "/" . $file_biaya->getClientOriginalName(),
                'periode_sik' => $request->periode_sik,
            ]);
            return redirect()->back()->with('success', 'Surat anda Berhasil dibuat');
        }

        if ($request->jenis_surat == "str") {
            // dd($request->all());
            // KTA
            $path_kta = 're_STR/KTA'; 
            $file_kta = $request->file('upload_kta');
            Storage::putFileAs($path_kta, $file_kta, $file_kta->getClientOriginalName());   
            // KTA
            $path_str = 're_STR/STR'; 
            $file_str = $request->file('upload_str');
            Storage::putFileAs($path_str, $file_str, $file_str->getClientOriginalName());   

            
            suratSTR::create([
                'user_id' => Auth::user()->id,
                'name' => $request->nama,
                'no_kta' => $request->no_kta,
                'upload_kta' => $path_kta . "/" . $file_kta->getClientOriginalName(),
                'no_str' => $request->no_str,
                'upload_str' => $path_str . "/" . $file_str->getClientOriginalName(),
                'taggal_berakhir' => $request->tanggal_berakhir,
                'instansi' => $request->instansi,
                'no_telp' => $request->no_telp,
            ]);

            return redirect()->back()->with('success', 'Surat anda Berhasil dibuat');
        }

        if ($request->jenis_surat == "kredensial") {
            // surat kredensial
            $path_kredensial = 'Kredensial/surat_kredensial'; 
            $file_kredensial = $request->file('surat_kredensial');
            Storage::putFileAs($path_kredensial, $file_kredensial, $file_kredensial->getClientOriginalName());

            suratKredensial::create([
                'user_id' => Auth::user()->id,
                'surat_kredensial' => $request->surat_kredensial
            ]);

            return redirect()->back()->with('success', 'Surat anda Berhasil dibuat');
        }
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