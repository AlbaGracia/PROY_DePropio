<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            ['name' => 'Aire Libre'],
            ['name' => 'Espacio Expositivo'],
            ['name' => 'Museo'],
            ['name' => 'Teatro'],
            ['name' => 'Sala'],
            ['name' => 'Centro cívico'],
            ['name' => 'Centro comercial'],
        ]);
    }
}
