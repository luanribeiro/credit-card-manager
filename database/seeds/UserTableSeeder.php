<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "User regular",
            'email' => "regular@mail.com",
            'password' => Hash::make("123456"),
        ]);

        DB::table('users')->insert([
            'name' => "User admin",
            'email' => "admin@mail.com",
            'password' => Hash::make("123456"),
            'role' => "ADMIN",
        ]);
    }
}
