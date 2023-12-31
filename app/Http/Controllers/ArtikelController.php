<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = artikel::all();
        return view('admin.artikel.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = 'Gambar_Artikel'; 
        $file = $request->file('gambar');
        Storage::putFileAs($path, $file, $file->getClientOriginalName());

        artikel::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'meta_judul' => $request->meta_judul,
            'meta_deskripsi' => $request->meta_deskripsi,
            'konten' => $request->konten,
            'gambar' => $path . "/" . $file->getClientOriginalName(),
        ]);

        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = artikel::where('slug', $id)->first();
        return view('admin.artikel.show', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $data = artikel::where('id', $id)->first();
        return view('admin.artikel.edit', ['data'=>$data]);
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
        $path = 'Gambar_Artikel'; 
        $file = $request->file('gambar');
        Storage::putFileAs($path, $file, $file->getClientOriginalName());

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'meta_judul' => $request->meta_judul,
            'meta_deskripsi' => $request->meta_deskripsi,
            'konten' => $request->konten,
            'gambar' => $path . "/" . $file->getClientOriginalName(),
        ];
        
        $data = artikel::where('id', $id)->update($data);

        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        artikel::where('id', $id)->delete();
        return redirect()->route('artikel.index');
    }
}