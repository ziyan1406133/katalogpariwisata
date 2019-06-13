<?php

use Illuminate\Database\Seeder;
use App\Wilayah;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed = new Wilayah;
        $seed->id = '1';
        $seed->nama = 'Garut Selatan';
        $seed->save();

        $seed = new Wilayah;
        $seed->id = '2';
        $seed->nama = 'Garut Utara';
        $seed->save();


    }
}
