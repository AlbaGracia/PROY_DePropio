<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'name' => 'Aragón y las Artes 1957-1975',
                'description' => 'Exposición sobre la relación entre Aragón y las Artes durante el periodo de 1957 a 1975.',
                'start_date' => '2023-11-16',
                'end_date' => '2025-08-31',
                'web_url' => 'https://iaacc.es/events/aragon-y-las-artes-1957-1975/?occurrence=2023-11-16',
                'space_id' => 1,
                'category_id' => 8,
                'image_path' => 'storage/events/images/Aragon-Las-Artes.webp'
            ]
        ]);

        DB::table('events')->insert(
            [
                'name' => '[REC]UERDOS. La vida a través del cine doméstico',
                'description' => 'En esta exposición se recuperan relatos pasados y actuales a través de las miradas cotidianas de las familias de cada época: un recorrido que nos permite ahondar en las relaciones entre imagen, realidad y memoria.',
                'start_date' => '2025-02-28',
                'end_date' => '2025-06-08',
                'web_url' => 'https://caixaforum.org/es/zaragoza/p/recuerdos_a168538824',
                'space_id' => 3,
                'category_id' => 8,
                'price' => 6,
                'image_path' => 'storage/events/images/recuerdos-caixaforum.jpg'
            ]
        );

        DB::table('events')->insert(
            [
                'name' => 'Tardeo poético: poderío femenino en la copla, con Diana Navarro y Lidia García',
                'description' => 'Entre el mandato social y la rebeldía, las mujeres de la copla transgredían la moral importante hasta el punto de constituirse como contramodelos del ama de casa de la época. Su legado arrebatado todavía nos acompaña. He aquí el punto de partida de una conversación entre la cantante y artista malagueña Diana Navarro y la investigadora Lidia García, autora del pódcast ¡Ay, campaneras!. Juntas, entre la palabra y la canción, pondrán en valor el poderío femenino en la copla.',
                'start_date' => '2025-04-29',
                'web_url' => 'https://caixaforum.org/es/zaragoza/p/tardeo-poetico-con-diana-navarro-y-lidia-garcia_a169692497',
                'space_id' => 3,
                'category_id' => 10,
                'price' => 6,
                'image_path' => 'storage/events/images/tardeo-politico.jpg'
            ]
        );
    }
}
