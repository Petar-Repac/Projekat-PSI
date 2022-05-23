<?php
//Autor: Petar Repac
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use  \App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    
        //Create admin
        User::create([
            'username' => env('TOBAGO_ADMIN_USERNAME'),
            'password' => Hash::make(env('TOBAGO_ADMIN_PASSWORD')),
            'role' => Role::admin()->idRole,
            'isBanned' => false,
            'postStatus' => 0,
        ]);
    }
}
