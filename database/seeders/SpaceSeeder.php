<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spaces')->insert([
            'name' => 'IAACC Pablo Serrano',
            'adress' => 'https://www.google.com/maps/place/IAACC+Pablo+Serrano/data=!4m2!3m1!19sChIJ30SHvMMUWQ0RcalSJRg1-aY',
            'web_url' => 'https://iaacc.es/',
            'type_id' => 3,
            'user_id' => 2,
        ]);

        DB::table('spaces')->insert([
            'name' => 'Teatro Principal',
            'adress' => 'https://www.google.com/maps/place/Teatro+Principal/data=!4m2!3m1!19sChIJ28rftOXAz4UR9otevmF9Vos',
            'web_url' => 'https://teatroprincipalzaragoza.com/',
            'type_id' => 4,
        ]);
    }
}
