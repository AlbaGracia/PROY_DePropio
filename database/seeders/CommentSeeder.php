<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            [
                'user_id' => 3,
                'text' => 'Esta exposición es increíble, me encanta la relación entre Aragón y las Artes durante ese periodo.',
                'event_id' => 1, 
                'publish_date' => '2025/02/11',
            ],
        ]);
    }
}
