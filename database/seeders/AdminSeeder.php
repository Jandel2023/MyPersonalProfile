<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{

    public function run(): void
    {
        $name = 'Jandel Lopez';
        $email = 'jandellopez1997@gmail.com';
        $role = 'Admin';
        $age = 26;
        $address = 'Leyte, Hindang 6523';
        $phone = 9201985437;
        $website = 'jandel.webactivities.online';

        DB::table('users')->insert ([
            [
                'name' => $name,
                'email' => $email,
                'role_name' => $role,
                'password' => Hash::make('admin12345'),
                'age' => $age,
                'address' => $address,
                'phone' => $phone,
                'website' => $website,
                'remember_token' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
