<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'admin_space']);
        Role::firstOrCreate(['name' => 'user']);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@depropio.com',
            'password' => Hash::make('Admin-123'),
            'type_user' => 'admin',
        ]);
        $admin->assignRole('admin');

        $adminIAACC = User::create([
            'name' => 'IAACC_admin',
            'email' => 'admin@iaacc.com',
            'password' => Hash::make('iaacc123'),
            'type_user' => 'admin_space',
        ]);
        $adminIAACC->assignRole('admin_space');

        $marcos = User::create([
            'name' => 'Marcos Alcazar',
            'email' => 'malcazar@gmail.com',
            'password' => Hash::make('12345'),
            'type_user' => 'user',
        ]);
        $marcos->assignRole('user');

        $noa = User::create([
            'name' => 'Noa Mellado',
            'email' => 'nmellado@gmail.com',
            'password' => Hash::make('12345'),
            'type_user' => 'user',
        ]);
        $noa->assignRole('user');

        $adminCentrosCivicos = User::create([
            'name' => 'Centros civicos',
            'email' => 'info@cczaragoza.com',
            'password' => Hash::make('CCZgz-2025'),
            'type_user' => 'admin_space',
        ]);
        $adminCentrosCivicos->assignRole('admin_space');

    }
}
