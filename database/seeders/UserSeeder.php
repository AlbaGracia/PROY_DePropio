<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@depropio.com',
            'password' => Hash::make('admin123'),
            'type_user' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'IAACC_admin',
            'email' => 'admin@iaacc.com',
            'password' => Hash::make('iaacc123'),
            'type_user' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Marcos Alcazar',
            'email' => 'malcazar@gmail.com',
            'password' => Hash::make('12345'),
            'type_user' => 'normal',
        ]);
        DB::table('users')->insert([
            'name' => 'Noa Mellado',
            'email' => 'nmellado@gmail.com',
            'password' => Hash::make('12345'),
            'type_user' => 'normal',
        ]);
    }
}
