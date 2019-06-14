<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilayah;

class WilayahController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wilayahs = Wilayah::orderBy('created_at', 'asc')->get();
        $no=1;

        return view('admin.wilayah.index', compact('wilayahs', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wilayah = new Wilayah;
        $wilayah->nama = $request->input('nama');
        $wilayah->save();

        return redirect('/wilayah')->with('success', 'Wilayah baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('/dashboard');
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
        $wilayah = Wilayah::findOrFail($id);
        $wilayah->nama = $request->input('nama');
        $wilayah->save();

        return redirect('/wilayah')->with('success', 'Wilayah berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wilayah = Wilayah::findOrFail($id);
        $lokasis = Lokasi::where('wilayah_id', $id)->get();
        if(count($lokasis) > 0) {
            foreach ($lokasis as $lokasi) {
                $fotos = Foto::where('lokasi_id', $$lokasi->id)->get();
                if(count($fotos) > 0) {
                    foreach ($fotos as $foto) {
                        Storage::delete('public/imgaes/lokasi/'.$foto->gambar);
                        $foto->delete();
                    }
                }
                $lokasi->delete();
            }
        }
        $wilayah->delete();

        return redirect('/wilayah')->with('success', 'Wilayah berhasil dihapus');
    }
}
