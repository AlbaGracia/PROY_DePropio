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
            ['name' => 'undefined'],
            ['name' => 'Conciertos'],       //01
            ['name' => 'Teatro'],           //02
            ['name' => 'Cine'],             //03
            ['name' => 'Deportes'],         //04
            ['name' => 'Conferencias'],     //05
            ['name' => 'Talleres'],         //06
            ['name' => 'Ferias'],           //07
            ['name' => 'Exposiciones'],     //08
            ['name' => 'Festivales'],       //09
            ['name' => 'Encuentros'],       //10
            ['name' => 'Festival'],         //11
        ]);
    }
}
