<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [
            'SuperAdmin',
            'Admin',
            'Author',
            'Editor',
            'Customer',
        ];

        foreach ($role as $key => $item){

            // UserRole::insert('insert into user_roles (id, name) values (?, ?)', [$key+1, $item[$key]]);
            // UserRole::insert('insert into user_roles (role_name, role_slug) values (?)', [$item[$key], $item[$key]]);

            UserRole::insert([
                'role_name' => $item,
                'role_slug' => $item,
                'role_status' => 1,
            ]);
        }

    }
}
