<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(WilayahSeeder::class);
        $this->call(LokasiSeeder::class);
        $this->call(FotoSeeder::class);
        $this->call(UserSeeder::class);
    }
}
