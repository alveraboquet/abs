<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'username' => 'admin',
            'full_name' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => 'admin',
            'password' => Hash::make('123456'),
            'security_pin' => Hash::make('123456'),
            'country' => 1,
            'province' => 2,
            'invite_code' => 'J6QYU1',
            'total_direct' => 2,
            'total_group' => 4,
            'role' => 'admin',
        ]);

        User::create([
            'username' => '1',
            'full_name' => '1',
            'email' => '1@1.com',
            'phone' => '1',
            'password' => Hash::make('123456'),
            'security_pin' => Hash::make('123456'),
            'country' => 1,
            'province' => 2,
            'invite_code' => '123456',
            'total_direct' => 1,
            'total_group' => 1,
            'referral' => 1,
            'hierarchyList' => '-1-',
        ]);

        User::create([
            'username' => '2',
            'full_name' => '2',
            'email' => '2@2.com',
            'phone' => '2',
            'password' => Hash::make('123456'),
            'security_pin' => Hash::make('123456'),
            'country' => 1,
            'province' => 2,
            'invite_code' => '234567',
            'total_direct' => 0,
            'total_group' => 0,
            'referral' => 2,
            'hierarchyList' => '-1-2-',
        ]);


        User::create([
            'username' => '3',
            'full_name' => '3',
            'email' => '3@3.com',
            'phone' => '3',
            'password' => Hash::make('123456'),
            'security_pin' => Hash::make('123456'),
            'country' => 1,
            'province' => 2,
            'invite_code' => '345678',
            'total_direct' => 1,
            'total_group' => 1,
            'referral' => 1,
            'hierarchyList' => '-1-',
        ]);


        User::create([
            'username' => '4',
            'full_name' => '4',
            'email' => '4@4.com',
            'phone' => '4',
            'password' => Hash::make('123456'),
            'security_pin' => Hash::make('123456'),
            'country' => 1,
            'province' => 2,
            'invite_code' => '456789',
            'total_direct' => 0,
            'total_group' => 0,
            'referral' => 4,
            'hierarchyList' => '-1-4-',
        ]);
    }
}
