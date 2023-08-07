<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = event::all();
        return view('admin.event.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input sebelum menyimpan
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
        ]);
    
        $path = 'Gambar_Event'; 
        $file = $request->file('gambar');
        Storage::putFileAs($path, $file, $file->getClientOriginalName());
    
        // Pastikan bahwa 'jam' memiliki nilai yang valid
        $jam = $request->has('jam') ? $request->jam : null;
    
        // Simpan data event ke database
        Event::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'deskripsi' => $request->deskripsi,
            'gambar' => $path . "/" . $file->getClientOriginalName(),
            'tanggal' => $request->tanggal,
            'jam' => $jam,
        ]);
    
        return redirect()->route('event.index');
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
