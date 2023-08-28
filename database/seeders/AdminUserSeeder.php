<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Muajjam Hossain',
            'email' => 'admin@admin.com',
            'username' =>'Muajjam-Hossain',
            'phone' =>'01911194724',
            'role_id' =>'1',
            'password' => bcrypt('12345678'),
        ]);
    }
}
