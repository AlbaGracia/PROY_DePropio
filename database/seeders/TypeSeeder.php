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
            ['name' => 'undefined'], //1
            ['name' => 'Aire Libre'], //2
            ['name' => 'Espacio Expositivo'], //3
            ['name' => 'Museo'], //4
            ['name' => 'Teatro'], //5
            ['name' => 'Sala'], //6
            ['name' => 'Centro cívico'], //7
            ['name' => 'Centro comercial'], //8
        ]);
    }
}
