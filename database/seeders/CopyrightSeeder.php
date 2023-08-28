<?php

namespace Database\Seeders;

use App\Models\Copyright;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CopyrightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $title = '© Copyright 2023. Test Demo Pvt. Limited';
        $slug = Str::slug($title);
        Copyright::create([
            'copy_title' => $title,
            'copy_creator' => '1',
            'copy_slug' => $slug

        ]);
    }
}
