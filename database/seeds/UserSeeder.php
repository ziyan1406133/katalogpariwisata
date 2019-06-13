<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed = new User;
        $seed->id = '1';
        $seed->nama = 'Elga Sukma Wijaya';
        $seed->username = 'Elga028';
        $seed->email = '1506028@sttgarut.ac.id';
        $seed->status = 'Super Admin';
        $seed->password = bcrypt('password');
        $seed->save();

        $seed = new User;
        $seed->id = '2';
        $seed->nama = 'Admin';
        $seed->username = 'admin1';
        $seed->email = 'admin@katalogpariwisata.dev';
        $seed->status = 'Admin';
        $seed->password = bcrypt('password');
        $seed->save();

    }
}
