<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasis';
    public $primaryKey = 'id';
    public $timestamps = 'true';
    
    public function wilayah(){
        return $this->hasOne('App\Wilayah');
    }

    public function foto(){
        return $this->hasMany('App\Foto');
    }
}
