<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Silver',
        ]);
        DB::table('categories')->insert([
            'name' => 'Gold',
        ]);
        DB::table('categories')->insert([
            'name' => 'Platinum',
        ]);
        DB::table('categories')->insert([
            'name' => 'Black',
        ]);
    }
}
