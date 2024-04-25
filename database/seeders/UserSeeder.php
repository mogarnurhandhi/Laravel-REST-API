<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            "name"=>"Mogar Nurhandhi",
            "email"=>"mogar2122@yahoo.com",
            "password"=> \Hash::make('toko123'),
        ]);
    }
}
