<?php

namespace Database\Seeders;
use App\Models\Space;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Space::create([
            'name' => 'One Party Events',
            'address' => ' Stadiou 60',
            'city' => 'Athens',
            'zip_code' => '10564'
        ]);

        Space::create([
            'name' => 'Casarma Garden ',
            'address' => 'Kifisias 8',
            'city' => 'Aharnes',
            'zip_code' => '13672'
        ]);

         Space::create([
            'name' => 'Chryso Elafi',
            'address' => 'Parnithos Avenue 370',
            'city' => 'Aharnes',
            'zip_code' => '13679'
        ]);
    }
}
