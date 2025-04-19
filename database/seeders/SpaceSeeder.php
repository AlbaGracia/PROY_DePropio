<?php

namespace Database\Seeders;

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
            [
                'name' => 'IAACC Pablo Serrano',
                'description' => 'El Instituto Aragonés de Arte y Cultura Contemporáneos, popularmente conocido como Museo Pablo Serrano, es un centro dedicado al arte moderno y actual, que tiene por repertorio fundacional un amplio fondo de obras del escultor aragonés Pablo Serrano.',
                'address' => 'https://www.google.com/maps/place/IAACC+Pablo+Serrano/data=!4m2!3m1!19sChIJ30SHvMMUWQ0RcalSJRg1-aY',
                'web_url' => 'https://iaacc.es/',
                'type_id' => 3,
                'image_path' => 'storage/spaces/images/Museo-IACC-Pablo-Serrano.webp'
            ],
            [
                'name' => 'Teatro Principal',
                'description' => 'El Teatro Principal de Zaragoza es el teatro más importante de la ciudad, situado en el número 57 de la céntrica calle del Coso.',
                'address' => 'https://www.google.com/maps/place/Teatro+Principal/data=!4m2!3m1!19sChIJ28rftOXAz4UR9otevmF9Vos',
                'web_url' => 'https://teatroprincipalzaragoza.com/',
                'type_id' => 4,
                'image_path' => 'storage/spaces/images/Teatro-Principal.webp'
            ],
            [
                'name' => 'CaixaForum Zaragoza',
                'description' => 'Centro cultural que ofrece exposiciones, conciertos, talleres y actividades para todas las edades.',
                'address' => 'https://www.google.com/maps/place/CaixaForum+Zaragoza',
                'web_url' => 'https://caixaforum.org/es/zaragoza',
                'type_id' => 3,
                'image_path' => 'storage/spaces/images/caixaforum_zaragoza.jpg'
            ],
            [
                'name' => 'Auditorio de Zaragoza',
                'description' => 'Espacio escénico que alberga conciertos, obras de teatro y otros eventos culturales.',
                'address' => 'https://www.google.com/maps/place/Auditorio+de+Zaragoza',
                'web_url' => 'https://auditoriozaragoza.com/',
                'type_id' => 4,
                'image_path' => 'storage/spaces/images/auditorio_zaragoza.jpg'
            ],
            [
                'name' => 'Centro de Historias',
                'description' => 'Espacio expositivo que alberga exposiciones temporales de arte y cultura.',
                'address' => 'https://www.google.com/maps/place/Centro+de+Historias',
                'web_url' => 'https://www.zaragoza.es/ciudad/museos/es/chistoria',
                'type_id' => 2,
                'image_path' => 'storage/spaces/images/centro_de_historias.jpg'
            ],
            [
                'name' => 'Centro Cívico Universidad',
                'description' => 'Centro cultural que ofrece una amplia variedad de actividades y talleres.',
                'address' => 'https://www.google.com/maps/place/Centro+C%C3%ADvico+Universidad',
                'web_url' => 'https://www.zaragoza.es/sede/servicio/equipamiento/2119',
                'type_id' => 6,
                'image_path' => 'storage/spaces/images/centro_civico_universidad.jpg'
            ],
            [
                'name' => 'Feria de Zaragoza',
                'description' => 'Recinto ferial que alberga ferias, congresos y eventos de diversa índole.',
                'address' => 'https://www.google.com/maps/place/Feria+de+Zaragoza',
                'web_url' => 'https://www.feriazaragoza.es/',
                'type_id' => 2,
                'image_path' => 'storage/spaces/images/feria_de_zaragoza.jpg'
            ],
            [
                'name' => 'Teatro de las Esquinas',
                'description' => 'Espacio escénico integral con programación de teatro, conciertos y espectáculos familiares.',
                'address' => 'https://www.google.com/maps/place/Teatro+de+las+Esquinas',
                'web_url' => 'https://www.teatrodelasesquinas.com/',
                'type_id' => 4,
                'image_path' => 'storage/spaces/images/teatro_de_las_esquinas.jpg'
            ],
            [
                'name' => 'Centro Cívico Delicias',
                'description' => 'Centro cultural que ofrece actividades y talleres para todos los públicos.',
                'address' => 'https://www.google.com/maps/place/Centro+C%C3%ADvico+Delicias',
                'web_url' => 'https://www.taquilla.com/zaragoza/centro-civico-delicias-zaragoza',
                'type_id' => 6,
                'image_path' => 'storage/spaces/images/centro_civico_delicias.jpg'
            ],
            [
                'name' => 'Museo del Fuego y de los Bomberos',
                'description' => 'Museo dedicado a la historia del fuego y la labor de los bomberos.',
                'address' => 'https://www.google.com/maps/place/Museo+del+Fuego+y+de+los+Bomberos',
                'web_url' => 'https://www.zaragoza.es/sede/portal/bomberos/servicio/equipamiento/4465',
                'type_id' => 3,
                'image_path' => 'storage/spaces/images/museo_del_fuego.jpg'
            ],
            [
                'name' => 'Museo del Teatro Romano',
                'description' => 'Centro arqueológico con restos y exposiciones del antiguo teatro romano Caesaraugusta.',
                'address' => 'https://www.google.com/maps/place/Museo+del+Teatro+Romano',
                'web_url' => 'https://www.zaragoza.es/sede/portal/museos/teatro/',
                'type_id' => 3,
                'image_path' => 'storage/spaces/images/teatro-romano.jpg'
            ],
            [
                'name' => 'Etopia - Centro de Arte y Tecnología',
                'description' => 'Espacio para exposiciones multimedia, talleres tecnológicos y arte digital.',
                'address' => 'https://www.google.com/maps/place/Etopia+Zaragoza',
                'web_url' => 'https://www.zaragoza.es/sede/portal/etopia/',
                'type_id' => 6,
                'image_path' => 'storage/spaces/images/etopia.webp'
            ],
            [
                'name' => 'Sala López',
                'description' => 'Sala de conciertos independientes y eventos musicales alternativos.',
                'address' => 'https://www.google.com/maps/place/Sala+López+Zaragoza',
                'web_url' => 'https://salalopez.com/',
                'type_id' => 5,
                'image_path' => 'storage/spaces/images/sala-lopez.png'
            ],
            [
                'name' => 'Parque Grande José Antonio Labordeta',
                'description' => 'Parque urbano con eventos al aire libre, conciertos y mercadillos.',
                'address' => 'https://www.google.com/maps/place/Parque+Grande+Zaragoza',
                'web_url' => 'https://www.zaragoza.es/sede/portal/turismo/post/parque-grande-jose-antonio-labordeta',
                'type_id' => 1,
                'image_path' => 'storage/spaces/images/parque-grande.jpg'
            ],
            [
                'name' => 'Puerto Venecia',
                'description' => 'Centro comercial con una amplia oferta de ocio, cine y actividades temporales.',
                'address' => 'https://www.google.com/maps/place/Puerto+Venecia+Zaragoza',
                'web_url' => 'https://puertovenecia.com',
                'type_id' => 7,
                'image_path' => 'storage/spaces/images/puerto-venecia.jpg'
            ],
            [
                'name' => 'Grancasa',
                'description' => 'Centro comercial con actividades, exposiciones y zona de restauración.',
                'address' => 'https://www.google.com/maps/place/Grancasa+Zaragoza',
                'web_url' => 'https://grancasa.es',
                'type_id' => 7,
                'image_path' => 'storage/spaces/images/grancasa.jpg'
            ]
        ]);
    }
}
