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

        // User::create([
        //     'name'=>'daniel',
        //     'email'=>'wambua.daniel@strathmore.edu',
        //     'password'=>Hash::make('1299'),
        // ]);
        
        
        Roles::insert([
            ['roles'=>'admin'],
            ['roles'=>'normal']
        ]);
        UserRoles::create([
            'user_id'=>1,
            'role_id'=>1
        ]);
        $users = [
        [
            'name' => 'Don',
            'email' => 'don.kamoya@strathmore.edu',
            'password' => Hash::make('password'),
        ],
        [
            'name' => 'arabella',
            'email' => 'arabella.mutende@strathmore.edu',
            'password' => Hash::make('password'),
        ],
        [
            'name' => 'leone',
            'email' => 'leone.oluoch@strathmore.edu',
            'password' => Hash::make('password'),
        ],
        [
            'name' => 'brian',
            'email' => 'brian.kipketer@strathmore.edu',
            'password' => Hash::make('password'),
        ],
        [
            'name' => 'kalvin',
            'email' => 'kalvin.oanda@365.strathmore.edu',
            'password' => Hash::make('password'),
        ],
        [
            'name' => 'Kyla',
            'email' => 'kyla.neema@strathmore.edu',
            'password' => Hash::make('password'),
            
        ],
        [
            'name' => 'khalifa',
            'email' => 'khalifa.fumo@strathmore.edu',
            'password' => Hash::make('password'),
        ],
    ];

        User::insert($users);
    
    }
}
