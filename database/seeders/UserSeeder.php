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
            'email' => 'admin@admin.com',
            'role'  => 1,
            'password' => Hash::make('password'),
        ]);
        DB::table('roles')->insert([
            'name'=> 'Admin',
        ]);
        $permissions = [
            [
                'menu_name' => 'Client',
                'role_id' => 1,
                'view' => 1,
                'insert' => 1,
                'update' => 1,
                'delete'=> 1,
            ],
            [
                'menu_name' => 'User',
                'role_id' => 1,
                'view' => 1,
                'insert' => 1,
                'update'=> 1,
                'delete'=> 1,
            ],
            [
                'menu_name' => 'Booking',
                'role_id' => 1,
                'view' => 1,
                'insert' => 1,
                'update'=> 1,
                'delete'=> 1,
            ],
            [
                'menu_name' => 'Services',
                'role_id' => 1,
                'view' => 1,
                'insert' => 1,
                'update'=> 1,
                'delete'=> 1,
            ],
            [
                'menu_name' => 'Hall',
                'role_id' => 1,
                'view' => 1,
                'insert' => 1,
                'update'=> 1,
                'delete'=> 1,
            ],
            [
                'menu_name' => 'Role',
                'role_id' => 1,
                'view' => 1,
                'insert' => 1,
                'update'=> 1,
                'delete'=> 1,
            ],
            // Add more permissions as needed
        ];
        DB::table('permissions')->insert($permissions);
    }
}
