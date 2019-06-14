<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'fotos';
    public $primaryKey = 'id';
    public $timestamps = 'true';
    
    public function lokasi(){
        return $this->belongsTo('App\Lokasi');
    }
}
