<?php

use Illuminate\Database\Seeder;

class CardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
            'name' => "Card 001",
            'slug' => "card-001",
            'image' => "tmp1",
            'brand_id' => 1,
            'category_id' => 1,
        ]);

        DB::table('cards')->insert([
            'name' => "Card 002",
            'slug' => "card-002",
            'image' => "tmp2",
            'brand_id' => 1,
            'category_id' => 2,
        ]);

        DB::table('cards')->insert([
            'name' => "Card 003",
            'slug' => "card-003",
            'image' => "tmp3",
            'brand_id' => 2,
            'category_id' => 1,
        ]);

        DB::table('cards')->insert([
            'name' => "Card 004",
            'slug' => "card-004",
            'image' => "tmp4",
            'brand_id' => 1,
            'category_id' => 3,
        ]);

        DB::table('cards')->insert([
            'name' => "Card 005",
            'slug' => "card-005",
            'image' => "tmp5",
            'brand_id' => 3,
            'category_id' => 2,
        ]);

        DB::table('cards')->insert([
            'name' => "Card 006",
            'slug' => "card-006",
            'image' => "tmp6",
            'brand_id' => 2,
            'category_id' => 1,
        ]);

        DB::table('cards')->insert([
            'name' => "Card 007",
            'slug' => "card-007",
            'image' => "tmp7",
            'brand_id' => 2,
            'category_id' => 2,
        ]);
    }
}
