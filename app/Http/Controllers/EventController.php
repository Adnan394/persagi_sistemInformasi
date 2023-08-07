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
        return view('admin.event.create');    
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

        event::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'deskripsi' => $request->deskripsi,
            'gambar' => $path . "/" . $file->getClientOriginalName(),
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
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
        $data = event::where('slug', $id)->first();
        return view('admin.event.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = event::where('id', $id)->first();
        return view('admin.event.edit', ['data' => $data]);
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
        $path = 'Gambar_Event'; 
        $file = $request->file('gambar');
        Storage::putFileAs($path, $file, $file->getClientOriginalName());

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'deskripsi' => $request->deskripsi,
            'gambar' => $path . "/" . $file->getClientOriginalName(),
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
        ];

        event::where('id', $id)->update($data);

        return redirect()->route('event.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        event::where('id', $id)->delete();
        return redirect()->route('event.index');
    }
}
