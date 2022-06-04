<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

         \App\Models\User::create([
             'ad' => 'Admin',
             'email' => 'admin@admin.com',
             'password' => \Hash::make("admin"),
             'yetki' => 2
         ]);
        \App\Models\User::create([
            'ad' => 'user',
            'email' => 'user@user.com',
            'password' => \Hash::make("user"),
            'yetki' => 1
        ]);
    }
}
