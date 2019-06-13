<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayahs';
    public $primaryKey = 'id';
    public $timestamps = 'true';
    
    public function lokasi(){
        return $this->hasMany('App\Lokasi');
    }
}
