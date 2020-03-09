<?php

use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'name' => 'Visa',
        ]);
        DB::table('brands')->insert([
            'name' => 'Mastercard',
        ]);
        DB::table('brands')->insert([
            'name' => 'Elo',
        ]);
    }
}
