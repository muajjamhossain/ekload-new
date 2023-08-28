<?php

namespace Database\Seeders;

use App\Models\Basic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Basic::insert([
            'basic_title' => 'This is Basic Title',
            'basic_subtitle' => 'This is Basic Sub-Title',
            'basic_details' => 'This is Basic Details',
            'basic_logo' => '',
            'basic_favicon' => '',
            'basic_flogo' => '',
            ]);
    }
}

