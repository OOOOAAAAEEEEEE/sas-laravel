<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MasterClasses;
use App\Models\MasterStatus;
use App\Models\DateIndex;
use App\Models\GroupClasses;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Arif Laksonodhewo',
            'role' => 'Admin',
            'email' => 'arifldhewo234@gmail.com',
            'password' => bcrypt('password'),
        ]); // End Admin

        // Tata Usaha
        User::create([
            'name' => 'Arif Laksonodhewo',
            'role' => 'TU',
            'email' => 'arifldhewo@gmail.com',
            'password' => bcrypt('password'),
        ]); // End Tata Usaha

        // Student
        User::factory(36)->create();
        // End Student

        // Master Kelas

        //  RPL
        MasterClasses::create([
            'class' => 'X RPL 1'
        ]);
        MasterClasses::create([
            'class' => 'XI RPL 1'
        ]);
        MasterClasses::create([
            'class' => 'XII RPL 1'
        ]);

        MasterClasses::create([
            'class' => 'X RPL 2'
        ]);
        MasterClasses::create([
            'class' => 'XI RPL 2'
        ]);
        MasterClasses::create([
            'class' => 'XII RPL 2'
        ]);
        //  END RPL

        // MM
        MasterClasses::create([
            'class' => 'X MM 1'
        ]);
        MasterClasses::create([
            'class' => 'XI MM 1'
        ]);
        MasterClasses::create([
            'class' => 'XII MM 1'
        ]);

        MasterClasses::create([
            'class' => 'X MM 2'
        ]);
        MasterClasses::create([
            'class' => 'XI MM 2'
        ]);
        MasterClasses::create([
            'class' => 'XII MM 2'
        ]);
        // END MM

        // End Master Kelas

        //Master Status
        MasterStatus::create([
            'status' => 'Alpha'
        ]);

        MasterStatus::create([
            'status' => 'Hadir'
        ]);

        MasterStatus::create([
            'status' => 'Izin'
        ]);

        MasterStatus::create([
            'status' => 'Sakit'
        ]);
        // End Master Status

        // Date Index
        DateIndex::create();
        // End Date Index

        //Group Classes
        GroupClasses::create([
            'master_classes_id' => '1'
        ]);
        GroupClasses::create([
            'master_classes_id' => '2'
        ]);
        GroupClasses::create([
            'master_classes_id' => '3'
        ]);
        GroupClasses::create([
            'master_classes_id' => '4'
        ]);
        GroupClasses::create([
            'master_classes_id' => '5'
        ]);
        GroupClasses::create([
            'master_classes_id' => '6'
        ]);
        GroupClasses::create([
            'master_classes_id' => '7'
        ]);
        GroupClasses::create([
            'master_classes_id' => '8'
        ]);
        GroupClasses::create([
            'master_classes_id' => '9'
        ]);
        GroupClasses::create([
            'master_classes_id' => '10'
        ]);
        GroupClasses::create([
            'master_classes_id' => '11'
        ]);
        GroupClasses::create([
            'master_classes_id' => '12'
        ]);
        //End Group Classes

        //Students
        // Student::factory(500)->create();
        //END Students
    }
}
