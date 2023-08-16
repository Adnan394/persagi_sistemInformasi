<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suratRekomendasi;
use App\Models\suratSTR;
use Illuminate\Support\Facades\Storage;

class dataSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekomendasi = suratRekomendasi::all();
        $str = suratSTR::all();
        return view('admin.surat.index', [
            'rekomendasi' => $rekomendasi,
            'str' => $str,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->jenis_surat=="rekomendasi") {
            $rekomendasi = suratRekomendasi::where('id', $id)->first();
            return view('admin.surat.show', [
                'jenis_surat' => 'rekomendasi',
                'rekomendasi' => $rekomendasi,
            ]);
        }
        if ($request->jenis_surat=="str") {
            $str = suratSTR::where('id', $id)->first();
            return view('admin.surat.show', [
                'jenis_surat' => 'str',
                'str' => $str,
            ]);
        }
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
        // dd($request->all());
        if ($request->jenis_surat == 'rekomendasi') {
            $path_surat = 'Rekomendasi/Surat_jadi'; 
            $file_surat = $request->file('surat_jadi');
            Storage::putFileAs($path_surat, $file_surat, $file_surat->getClientOriginalName());
    
            $data = [
                'is_complete' => 1,
                'surat_jadi' => $path_surat . "/" . $file_surat->getClientOriginalName(),
            ];
    
            suratRekomendasi::where('id', $id)->update($data);
            return redirect()->back();
        }
        if ($request->jenis_surat == 'str') {
            $path_surat = 're_STR/Surat_jadi'; 
            $file_surat = $request->file('surat_jadi');
            Storage::putFileAs($path_surat, $file_surat, $file_surat->getClientOriginalName());
    
            $data = [
                'is_complete' => 1,
                'surat_jadi' => $path_surat . "/" . $file_surat->getClientOriginalName(),
            ];
    
            suratSTR::where('id', $id)->update($data);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->jenis_surat == 'rekomendasi') {
            suratRekomendasi::where('id', $id)->delete();
            return redirect()->back();
        }
        if ($request->jenis_surat == 'str') {
            suratSTR::where('id', $id)->delete();
            return redirect()->back();
        }
    }
}