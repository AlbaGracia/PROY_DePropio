<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Conciertos'],
            ['name' => 'Teatro'],
            ['name' => 'Cine'],
            ['name' => 'Deportes'],
            ['name' => 'Conferencias'],
            ['name' => 'Talleres'],
            ['name' => 'Ferias'],
            ['name' => 'Exposiciones'],
            ['name' => 'Festivales'],
            ['name' => 'Encuentros'],
        ]);
    }
}
