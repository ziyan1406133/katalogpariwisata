<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokasi;
use App\Foto;
use App\Wilayah;
use Map;
use Storage;

class LokasiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasis = Lokasi::orderBy('created_at', 'desc')->paginate(6);
        $wilayahs = Wilayah::orderBy('created_at', 'desc')->get();

        return view('user.lokasi', compact('lokasis', 'wilayahs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminindex()
    {
        $lokasis = Lokasi::orderBy('created_at', 'desc')->get();
        $wilayahs = Wilayah::orderBy('created_at', 'desc')->get();
        $no=1;

        return view('admin.lokasi.index', compact('lokasis', 'wilayahs', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wilayahs = Wilayah::orderBy('created_at', 'desc')->get();

        return view('admin.lokasi.create', compact('wilayahs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'foto' => 'image|max:1999',
        ],
        [
            'foto' => 'Cover Foto harus berupa file gambar',
            'max' => 'Ukuran maksimal Goto adalah 2 MB',
        ]);

        $lokasi = new Lokasi;;
        $lokasi->nama = $request->input('nama');
        $lokasi->wilayah_id = $request->input('wilayah');
        $lokasi->alamat = $request->input('alamat');
        $lokasi->longitude = $request->input('longitude');
        $lokasi->latitude = $request->input('latitude');
        $lokasi->deskripsi_singkat = $request->input('deskripsi_singkat');
        if($request->hasFile('foto')){
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $FileNameToStore1 = $filename.'_'.time().'_.'.$extension;
            $path = $request->file('foto')->storeAs('public/images/lokasi', $FileNameToStore1);
            $lokasi->cover = $FileNameToStore1;
        }
        $lokasi->deskripsi_detail = $request->input('deskripsi_detail');
        $lokasi->save();

        return redirect('/adminlokasi')->with('success', 'Lokasi Baru Berhasil Ditambahkan');
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

        return view('user.show', compact('lokasi', 'fotos', 'map'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminshow($id)
    {
        $lokasi = Lokasi::findOrFail($id);

        return view('admin.lokasi.show', compact('lokasi'));
    }

        
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $wilayahs = Wilayah::orderBy('created_at', 'desc')->get();

        return view('admin.lokasi.edit', compact('wilayahs', 'lokasi'));
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
        $this->validate($request, [
        'foto' => 'image|max:1999',
        ],
        [
            'foto' => 'Cover Foto harus berupa file gambar',
            'max' => 'Ukuran maksimal Goto adalah 2 MB',
        ]);

        $lokasi = Lokasi::findOrFail($id);
        $lokasi->nama = $request->input('nama');
        $lokasi->wilayah_id = $request->input('wilayah');
        $lokasi->alamat = $request->input('alamat');
        $lokasi->longitude = $request->input('longitude');
        $lokasi->latitude = $request->input('latitude');
        $lokasi->deskripsi_singkat = $request->input('deskripsi_singkat');
        if($request->hasFile('foto')){
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $FileNameToStore1 = $filename.'_'.time().'_.'.$extension;
            $path = $request->file('foto')->storeAs('public/images/lokasi', $FileNameToStore1);
            if($lokasi->cover !== 'no_image.png') {
                Storage::delete('public/images/lokasi/'.$lokasi->cover);
                $lokasi->cover = $FileNameToStore1;
            }
        }
        $lokasi->deskripsi_detail = $request->input('deskripsi_detail');
        $lokasi->save();

        return redirect('/lokasi/'.$id.'/admin')->with('success', 'Lokasi Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $fotos = Foto::where('lokasi_id', $id)->get();
        if(count($fotos) > 0) {
            foreach ($fotos as $foto) {
                Storage::delete('public/images/lokasi/'.$foto->gambar);
                $foto->delete();
            }
        }
        $lokasi->delete();
        return redirect('/adminlokasi')->with('success', 'Lokasi berhasil dihapus');
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
            return view('user.lokasi', compact('lokasis', 'wilayahs'));
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
            return view('user.lokasi', compact('lokasis', 'wilayahs'));
        }
    }
}
