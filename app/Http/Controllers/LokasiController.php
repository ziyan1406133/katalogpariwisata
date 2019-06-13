<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokasi;
use App\Foto;
use App\Wilayah;
use Map;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasis = Lokasi::orderBy('created_at')->paginate(6);
        $wilayahs = Wilayah::orderBy('created_at')->get();

        return view('user.lokasi', compact('lokasis', 'wilayahs'));
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
    public function show($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $wilayah = Wilayah::findOrFail($lokasi->wilayah_id);
        $fotos = Foto::where('lokasi_id', $id)->get();

        $config = array();
        $config['map_height'] = '300px';
        $config['zoom'] = '10';
        $config['draggableCursor'] = 'default';

        Map::initialize($config);

        $config = array();
        $config['center'] = $lokasi->longitude.', '.$lokasi->latitude;
        $config['draggableCursor'] = 'default';
        Map::initialize($config);
  
        $marker = array();
        $marker['position'] = $lokasi->longitude.', '.$lokasi->latitude;
        Map::add_marker($marker);

        Map::initialize($config);
        $map = Map::create_map();

        return view('user.show', compact('lokasi', 'wilayah', 'fotos', 'map'));
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

    /**
     * Search items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $wilayah_id = $request->input('wilayah');
        $search = $request->input('search');

        if($wilayah_id == '0') {
            $lokasis = Lokasi::where('nama', 'like', '%'.  $search.'%')
                            ->orWhere('alamat', 'like', '%'. $search.'%')
                            ->orWhere('deskripsi_singkat', 'like', '%'. $search.'%')
                            ->orWhere('deskripsi_detail', 'like', '%'. $search.'%')
                            ->paginate(6);
                            
            $wilayahs = Wilayah::orderBy('created_at')->get();
            return view('user.searchlokasi', compact('lokasis', 'wilayahs'));
        } else {
            $lokasis = Lokasi::where('wilayah_id', $wilayah_id)
                            ->where(function($q) use ($search) {
                                $q->where('nama', 'like', '%'.$search.'%')
                                ->orWhere('alamat', 'like', '%'. $search.'%')
                                ->orWhere('deskripsi_singkat', 'like', '%'. $search.'%')
                                ->orWhere('deskripsi_detail', 'like', '%'. $search.'%');
                            })
                            ->paginate(6);

            $wilayahs = Wilayah::orderBy('created_at')->get();
            return view('user.searchlokasi', compact('lokasis', 'wilayahs'));
        }
    }
}
