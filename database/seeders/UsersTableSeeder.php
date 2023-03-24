<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'wawan',
                'email' => 'wawanstams123@gmail.com',
                'username' => 'admin1',
                'password' => bcrypt('admin1'),
            ]);
        
    }
}
