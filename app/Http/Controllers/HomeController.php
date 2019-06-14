<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokasi;
use App\Wilayah;
use App\Foto;
use App\User;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lokasis = Lokasi::inRandomOrder()->limit(6)->get();
        return view('user.homepage', compact('lokasis'));
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $lokasi = Lokasi::all();
        $wilayah = Wilayah::all();
        $foto = Foto::all();
        $admin = User::all();

        $jml_lokasi = count($lokasi);
        $jml_wilayah = count($wilayah);
        $jml_foto = count($foto) + $jml_lokasi;
        $jml_admin = count($admin);

        return view('admin.dashboard', compact('jml_lokasi', 'jml_wilayah', 'jml_foto', 'jml_admin'));
    }
}
