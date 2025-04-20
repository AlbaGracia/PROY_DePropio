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
            [ //01
                'name' => 'IAACC Pablo Serrano',
                'description' => 'El Instituto Aragonés de Arte y Cultura Contemporáneos, popularmente conocido como Museo Pablo Serrano, es un centro dedicado al arte moderno y actual, que tiene por repertorio fundacional un amplio fondo de obras del escultor aragonés Pablo Serrano.',
                'address' => 'https://www.google.com/maps/place/IAACC+Pablo+Serrano/data=!4m2!3m1!19sChIJ30SHvMMUWQ0RcalSJRg1-aY',
                'web_url' => 'https://iaacc.es/',
                'type_id' => 3,
                'image_path' => 'storage/spaces/images/Museo-IACC-Pablo-Serrano.webp'
            ],
            [ //02
                'name' => 'Teatro Principal',
                'description' => 'El Teatro Principal de Zaragoza es el teatro más importante de la ciudad, situado en el número 57 de la céntrica calle del Coso.',
                'address' => 'https://maps.app.goo.gl/bW5kcVu8tr1RF5Em7',
                'web_url' => 'https://teatroprincipalzaragoza.com/',
                'type_id' => 4,
                'image_path' => 'storage/spaces/images/Teatro-Principal.webp'
            ],
            [ //03
                'name' => 'CaixaForum Zaragoza',
                'description' => 'Centro cultural que ofrece exposiciones, conciertos, talleres y actividades para todas las edades.',
                'address' => 'https://maps.app.goo.gl/3FXb2Z1Fp7sRLSQY6',
                'web_url' => 'https://caixaforum.org/es/zaragoza',
                'type_id' => 3,
                'image_path' => 'storage/spaces/images/caixaforum_zaragoza.jpg'
            ],
            [ //04
                'name' => 'Auditorio de Zaragoza',
                'description' => 'Espacio escénico que alberga conciertos, obras de teatro y otros eventos culturales.',
                'address' => 'https://maps.app.goo.gl/Dk3Qcs24DWcA5gxLA',
                'web_url' => 'https://auditoriozaragoza.com/',
                'type_id' => 4,
                'image_path' => 'storage/spaces/images/auditorio_zaragoza.jpg'
            ],
            [ //05
                'name' => 'Centro de Historias',
                'description' => 'Espacio expositivo que alberga exposiciones temporales de arte y cultura.',
                'address' => 'https://maps.app.goo.gl/ER3CEwfiiygmmsSM7',
                'web_url' => 'https://www.zaragoza.es/ciudad/museos/es/chistoria',
                'type_id' => 2,
                'image_path' => 'storage/spaces/images/centro_de_historias.jpg'
            ],
            [ //06
                'name' => 'Centro Cívico Universidad',
                'description' => 'Centro cultural que ofrece una amplia variedad de actividades y talleres.',
                'address' => 'https://maps.app.goo.gl/Dg1fmKwf4rEU3PDe7',
                'web_url' => 'https://www.zaragoza.es/sede/servicio/equipamiento/2119',
                'type_id' => 6,
                'image_path' => 'storage/spaces/images/centro_civico_universidad.jpg'
            ],
            [ //07
                'name' => 'Feria de Zaragoza',
                'description' => 'Recinto ferial que alberga ferias, congresos y eventos de diversa índole.',
                'address' => 'https://maps.app.goo.gl/5wbP7LbWBVhd8FJA8',
                'web_url' => 'https://www.feriazaragoza.es/',
                'type_id' => 2,
                'image_path' => 'storage/spaces/images/feria_de_zaragoza.jpg'
            ],
            [ //08
                'name' => 'Teatro de las Esquinas',
                'description' => 'Espacio escénico integral con programación de teatro, conciertos y espectáculos familiares.',
                'address' => 'https://maps.app.goo.gl/fazvm221vWpMQo7V6',
                'web_url' => 'https://www.teatrodelasesquinas.com/',
                'type_id' => 4,
                'image_path' => 'storage/spaces/images/teatro_de_las_esquinas.jpg'
            ],
            [ //09
                'name' => 'Centro Cívico Delicias',
                'description' => 'Centro cultural que ofrece actividades y talleres para todos los públicos.',
                'address' => 'https://maps.app.goo.gl/ksVqRPDbQkothNDK8',
                'web_url' => 'https://www.taquilla.com/zaragoza/centro-civico-delicias-zaragoza',
                'type_id' => 6,
                'image_path' => 'storage/spaces/images/centro_civico_delicias.jpg'
            ],
            [ //10
                'name' => 'Museo del Fuego y de los Bomberos',
                'description' => 'Museo dedicado a la historia del fuego y la labor de los bomberos.',
                'address' => 'https://maps.app.goo.gl/A8XuPh2QgMT7S5Wz8',
                'web_url' => 'https://www.zaragoza.es/sede/portal/bomberos/servicio/equipamiento/4465',
                'type_id' => 3,
                'image_path' => 'storage/spaces/images/museo_del_fuego.jpg'
            ],
            [ //11
                'name' => 'Museo del Teatro de Caesaragusta',
                'description' => 'Centro arqueológico con restos y exposiciones del antiguo teatro romano Caesaraugusta.',
                'address' => 'https://maps.app.goo.gl/U5DygVp82Agh7R8N7',
                'web_url' => 'https://www.zaragoza.es/sede/portal/museos/teatro/',
                'type_id' => 3,
                'image_path' => 'storage/spaces/images/teatro-romano.jpg'
            ],
            [ //12
                'name' => 'Etopia - Centro de Arte y Tecnología',
                'description' => 'Espacio para exposiciones multimedia, talleres tecnológicos y arte digital.',
                'address' => 'https://maps.app.goo.gl/mY8JDB5dEyLfCKbo8',
                'web_url' => 'https://www.zaragoza.es/sede/portal/etopia/',
                'type_id' => 6,
                'image_path' => 'storage/spaces/images/etopia.webp'
            ],
            [ //13
                'name' => 'Sala López',
                'description' => 'Sala de conciertos independientes y eventos musicales alternativos.',
                'address' => 'https://maps.app.goo.gl/x2ZePWuPSGUa3LDk6',
                'web_url' => 'https://salalopez.com/',
                'type_id' => 5,
                'image_path' => 'storage/spaces/images/sala-lopez.png'
            ],
            [ //14
                'name' => 'Parque Grande José Antonio Labordeta',
                'description' => 'Parque urbano con eventos al aire libre, conciertos y mercadillos.',
                'address' => 'https://maps.app.goo.gl/86c88nqjxjtFxHRh7',
                'web_url' => 'https://www.zaragoza.es/sede/portal/turismo/post/parque-grande-jose-antonio-labordeta',
                'type_id' => 1,
                'image_path' => 'storage/spaces/images/parque-grande.jpg'
            ],
            [ //15
                'name' => 'Puerto Venecia',
                'description' => 'Centro comercial con una amplia oferta de ocio, cine y actividades temporales.',
                'address' => 'https://maps.app.goo.gl/gu3bnBsKR6oCecMF8',
                'web_url' => 'https://puertovenecia.com',
                'type_id' => 7,
                'image_path' => 'storage/spaces/images/puerto-venecia.jpg'
            ],
            [ //16
                'name' => 'Grancasa',
                'description' => 'Centro comercial con actividades, exposiciones y zona de restauración.',
                'address' => 'https://maps.app.goo.gl/9ME7d2cM47Ni2KNj6',
                'web_url' => 'https://grancasa.es',
                'type_id' => 7,
                'image_path' => 'storage/spaces/images/grancasa.jpg'
            ]
        ]);
    }
}
