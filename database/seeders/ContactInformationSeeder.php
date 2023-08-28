<?php

namespace Database\Seeders;

use App\Models\ContactInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactInformation::create([
            'cont_phone1' => '1234567890',
            'cont_email1' => 'abc@gmail.com',
            'cont_add1' => 'Dhaka, Bangladesh',
        ]);
    }
}
