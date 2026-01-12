<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $role = Role::firstOrCreate(['name' => 'admin']);

        $admin = User::firstOrCreate(
            ['email' => 'yann@fanda.com'],
            [
                'nom_complet' => 'chamberlin',
                'password' => Hash::make('password123'),
                'telephone' => '+24265712904',
                'adresse' => 'Dakar',
            ]
        );

        $admin->assignRole($role);

        $admin2 = User::firstOrCreate(
            ['email' => 'juve@fanda.com'],
            [
                'nom_complet' => 'Juverson',
                'password' => Hash::make('password123'),
                'telephone' => '24265000000',
                'adresse' => 'Ngoyo',
            ]
        );
        $admin2->assignRole('admin');
    
     $admin3 = User::firstOrCreate(
            ['email' => 'daniel@fanda.com'],
            [
                'nom_complet' => 'Daniel',
                'password' => Hash::make('password123'),
                'telephone' => '24265000000',
                'adresse' => 'Ngoyo',
            ]
        );
        $admin3->assignRole('admin');
    }
}
