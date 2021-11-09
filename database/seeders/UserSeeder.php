<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'is_admin' => 0,
            'name' => Str::random(10),
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'is_admin' => 1,
            'name' => Str::random(10),
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
