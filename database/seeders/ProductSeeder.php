<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->insert([
            'id'=>1,
            'categories_id'=>1,
            'name'=>'TV Samsung 45 inch',
            'harga'=> 25000000
        ]);

        \DB::table('products')->insert([
            'id'=>2,
            'categories_id'=>2,
            'name'=>'TV Sharp 29 inch',
            'harga'=> 55000000
        ]);

        \DB::table('products')->insert([
            'id'=>3,
            'categories_id'=>3,
            'name'=>'TV LG 30 inch',
            'harga'=> 45000000
        ]);
    }
}
