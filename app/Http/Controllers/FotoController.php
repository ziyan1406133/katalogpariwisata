<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Foto;
use Storage;

class FotoController extends Controller
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
        return redirect('/dashboard');
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
        $id = $request->input('lokasi_id');

        $foto = new Foto;
        $foto->lokasi_id = $id;
        if($request->hasFile('gambar')){
            $filenameWithExt = $request->file('gambar')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $FileNameToStore1 = $filename.'_'.time().'_.'.$extension;
            $path = $request->file('gambar')->storeAs('public/images/lokasi', $FileNameToStore1);
            $foto->gambar = $FileNameToStore1;
        }
        $foto->save();

        return redirect('/lokasi/'.$id.'/admin')->with('success', 'Foto berhasil ditambahkan');    
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
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto = Foto::findOrFail($id);
        $lokasi_id = $foto->lokasi_id;
        Storage::delete('public/images/lokasi/'.$foto->gambar);
        $foto->delete();
        
        return redirect('/lokasi/'.$lokasi_id.'/admin')->with('success', 'Foto berhasil dihapus');   
    }
}
