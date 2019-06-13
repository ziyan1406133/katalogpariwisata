<?php

namespace App\Http\Controllers;
use App\Lokasi;
use App\Wilayah;
use Map;

use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function index() {

        $wilayahs = Wilayah::all();
        $config = array();
        $config['map_height'] = '550px';
        $config['zoom'] = 'auto';
        $config['draggableCursor'] = 'default';
        Map::initialize($config);

        $lokasis = Lokasi::all();
        
        $config['cluster'] = FALSE;
        $config['clusterStyles'] = array(
            array(
            "url"=>"https://raw.githubusercontent.com/googlemaps/js-marker-clusterer/gh-pages/images/m1.png",
            "width"=>"53",
            "height"=>"53"
            ));
        Map::initialize($config);
        foreach($lokasis as $lokasi){
            $marker = array();
            $marker['position'] = $lokasi->longitude.', '.$lokasi->latitude;
            $marker['infowindow_content'] = '<div style="text-align: center"><strong>'.$lokasi->nama.'</strong><hr><img src="/storage/images/lokasi/'.$lokasi->cover.'"style="height: 100px"><br><br><a target="_blank" href="/lokasi/'.$lokasi->id.'">Lihat Lokasi</a><br><a target="_blank" href="https://www.google.com/maps/dir//'.$lokasi->longitude.','.$lokasi->latitude.'">Petunjuk Arah</a></div>';
            Map::add_marker($marker);
        }

        Map::initialize($config);
        $map = Map::create_map();
        return view('user.peta', compact('map', 'wilayahs', 'lokasis'));
    }

    public function wilayah($id) {

        $wilayahs = Wilayah::all();

        $config = array();
        $config['map_height'] = '550px';
        $config['zoom'] = 'auto';
        $config['draggableCursor'] = 'default';
        Map::initialize($config);

        $lokasis = Lokasi::where('wilayah_id', $id)->get();
        
        $config['cluster'] = FALSE;
        $config['clusterStyles'] = array(
            array(
            "url"=>"https://raw.githubusercontent.com/googlemaps/js-marker-clusterer/gh-pages/images/m1.png",
            "width"=>"53",
            "height"=>"53"
            ));
        Map::initialize($config);
        foreach($lokasis as $lokasi){
            $marker = array();
            $marker['position'] = $lokasi->longitude.', '.$lokasi->latitude;
            $marker['infowindow_content'] = '<div style="text-align: center"><strong>'.$lokasi->nama.'</strong><hr><img src="/storage/images/lokasi/'.$lokasi->cover.'"style="height: 100px"><br><br><a target="_blank" href="/lokasi/'.$lokasi->id.'">Lihat Lokasi</a><br><a target="_blank" href="https://www.google.com/maps/dir//'.$lokasi->longitude.','.$lokasi->latitude.'">Petunjuk Arah</a></div>';
            Map::add_marker($marker);
        }

        Map::initialize($config);
        $map = Map::create_map();
        
        return view('user.peta', compact('map', 'wilayahs', 'lokasis'));

    }
}
