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
            ['name' => 'undefined'],        //01
            ['name' => 'Conciertos'],       //02
            ['name' => 'Teatro'],           //03
            ['name' => 'Cine'],             //04
            ['name' => 'Deportes'],         //05
            ['name' => 'Conferencias'],     //06
            ['name' => 'Talleres'],         //07
            ['name' => 'Ferias'],           //08
            ['name' => 'Exposiciones'],     //09
            ['name' => 'Festivales'],       //10
            ['name' => 'Encuentros'],       //11
        ]);
    }
}
