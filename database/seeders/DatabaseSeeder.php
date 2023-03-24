<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        //  \App\Models\User::factory()->create([
        //     'name' => 'marcelo',
        //     'email' => 'marcelooa26@gmail.com',
        //     'username' => 'admin',
        //     'password' => bcrypt('admin'),
        //  ],
        //  [
        //  'name' => 'wawan',
        //  'email' => 'wawanstams123@gmail.com',
        //  'username' => 'admin',
        //  'password' => bcrypt('admin'),
        //     ],
       // );

       $this->call([
        UserTableSeeder::class,
    ]);
    }
}
