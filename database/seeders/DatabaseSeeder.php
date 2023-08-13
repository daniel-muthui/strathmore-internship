<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Roles;
use App\Models\UserRoles;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name'=>'daniel',
            'email'=>'wambua.daniel@strathmore.edu',
            'password'=>Hash::make('1299'),
        ]);
        
        
        Roles::insert([
            ['roles'=>'admin'],
            ['roles'=>'normal']
        ]);
        UserRoles::create([
            'user_id'=>1,
            'role_id'=>1
        ]);
    }
}
