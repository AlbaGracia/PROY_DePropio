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
            'description' => 'El Instituto Aragonés de Arte y Cultura Contemporáneos, popularmente conocido como Museo Pablo Serrano, es un centro dedicado al arte moderno y actual, que tiene por repertorio fundacional un amplio fondo de obras del escultor aragonés Pablo Serrano.',
            'address' => 'https://www.google.com/maps/place/IAACC+Pablo+Serrano/data=!4m2!3m1!19sChIJ30SHvMMUWQ0RcalSJRg1-aY',
            'web_url' => 'https://iaacc.es/',
            'type_id' => 3,
            'user_id' => 2,
            'image_path' => 'storage/spaces/images/Museo-IACC-Pablo-Serrano.webp'
        ]);

        DB::table('spaces')->insert([
            'name' => 'Teatro Principal',
            'description' => 'El Teatro Principal de Zaragoza es el teatro más importante de la ciudad, situado en el número 57 de la céntrica calle del Coso.',
            'address' => 'https://www.google.com/maps/place/Teatro+Principal/data=!4m2!3m1!19sChIJ28rftOXAz4UR9otevmF9Vos',
            'web_url' => 'https://teatroprincipalzaragoza.com/',
            'type_id' => 4,
            'image_path' => 'storage/spaces/images/Teatro-Principal.webp'
        ]);
    }
}
