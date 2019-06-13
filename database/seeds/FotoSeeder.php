<?php

use Illuminate\Database\Seeder;
use App\Foto;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed = new Foto;
        $seed->id = '1';
        $seed->lokasi_id = '1';
        $seed->gambar = 'santolo1.jpg';
        $seed->save();

        $seed = new Foto;
        $seed->id = '2';
        $seed->lokasi_id = '1';
        $seed->gambar = 'santolo2.jpg';
        $seed->save();

        $seed = new Foto;
        $seed->id = '3';
        $seed->lokasi_id = '2';
        $seed->gambar = 'talaga bodas1.jpg';
        $seed->save();

        $seed = new Foto;
        $seed->id = '4';
        $seed->lokasi_id = '2';
        $seed->gambar = 'talaga bodas2.jpg';
        $seed->save();

    }
}
