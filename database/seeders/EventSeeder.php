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
            'name' => 'Aragón y las Artes 1957-1975',
            'description' => 'Exposición sobre la relación entre Aragón y las Artes durante el periodo de 1957 a 1975.',
            'start_date' => '2023-11-16',
            'end_date' => '2025-08-31',
            'web_url' => 'https://iaacc.es/events/aragon-y-las-artes-1957-1975/?occurrence=2023-11-16',
            'space_id' => 1,
            'category_id' => 8,
            'image_path' => 'storage/events/images/Aragon-Las-Artes.webp'
        ]);
        DB::table('events')->insert([

            'name' => 'Aragón y las Artes 1957-1975',
            'description' => 'Exposición sobre la relación entre Aragón y las Artes durante el periodo de 1957 a 1975.',
            'start_date' => '2023-11-16',
            'end_date' => '2025-08-31',
            'web_url' => 'https://iaacc.es/events/aragon-y-las-artes-1957-1975/?occurrence=2023-11-16',
            'space_id' => 1,
            'category_id' => 8,
        ]);
        DB::table('events')->insert([
            'name' => 'Aragón y las Artes 1957-1975',
            'description' => 'Exposición sobre la relación entre Aragón y las Artes durante el periodo de 1957 a 1975.',
            'start_date' => '2023-11-16',
            'end_date' => '2025-08-31',
            'web_url' => 'https://iaacc.es/events/aragon-y-las-artes-1957-1975/?occurrence=2023-11-16',
            'space_id' => 1,
            'category_id' => 8,
        ]);
        DB::table('events')->insert([
            'name' => 'Aragón y las Artes 1957-1975',
            'description' => 'Exposición sobre la relación entre Aragón y las Artes durante el periodo de 1957 a 1975.',
            'start_date' => '2023-11-16',
            'end_date' => '2025-08-31',
            'web_url' => 'https://iaacc.es/events/aragon-y-las-artes-1957-1975/?occurrence=2023-11-16',
            'space_id' => 1,
            'category_id' => 8,
        ]);
    }
}
