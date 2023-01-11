<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\students;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   

        // //Usuario adminsitrador
        //  \App\Models\User::create(
        //      [
        //      'key' => '546220',
        //      'password' => 'adminpass123',
        //      'rol' => 'admin',
        //      'permanent' => true
        //      ]
        // );

        // //Usuario staff
        // \App\Models\User::create(
        //      [
        //      'key' => '659854',
        //      'password' => '659854_staff',
        //      'rol' => 'staff',
        //      'permanent' => true
        //      ]
        // );


        // //Usuario expositor
        // \App\Models\student::create(
        //     [
        //     'enrollment' => '1853806',
        //     'fullName' => 'Edna Alexandra Lecea Contreras'
        //     ]
        // );

        // \App\Models\User::create(
        //     [
        //     'key' => '1853806',
        //     'password' => 'leceacontreras_1853806',
        //     'rol' => 'expositor',
        //     'permanent' => false
        //     ]
        // );

        //Maestro
        \App\Models\User::create(
            [
            'key' => '1801237',
            'password' => 'aleatoriasii',
            'rol' => 'teacher',
            'permanent' => false
            ]
        );
       
    }
}
