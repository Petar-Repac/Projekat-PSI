<?php
//Autor: Petar Repac
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use  \App\Models\User;
use  \App\Models\Post;
use Carbon\Carbon;


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

        //Create moderator
        User::create([
            'username' => 'Vojvoda',
            'password' => Hash::make('tobago123'),
            'role' => Role::mod()->idRole,
            'isBanned' => false,
            'postStatus' => 0,
        ]);

        //Create two users
        User::create([
            'username' => 'Sturm',
            'password' => Hash::make('tobago123'),
            'role' => Role::user()->idRole,
            'isBanned' => false,
            'postStatus' => 0,
        ]);

        User::create([
            'username' => 'Walter',
            'password' => Hash::make('tobago123'),
            'role' => Role::user()->idRole,
            'isBanned' => false,
            'postStatus' => 0,
        ]);


        //create three posts
        $currTime = Carbon::now()->timestamp;

        Post::create([
            'heading' => 'Razumna pretpostavka',
            'content' => 'Mit. Na ETF-u ne postoji razum.',
            'timePosted' => $currTime,
            'isPermanent' => false,
            'isLocked' => false,
            'author' => 3
        ]);

        Post::create([
            'heading' => 'Racunarski centar',
            'content' => 'Pogresan naziv za racunski centar :) ',
            'timePosted' => $currTime + 100,
            'isPermanent' => false,
            'isLocked' => false,
            'author' => 4
        ]);

        Post::create([
            'heading' => 'ETF',
            'content' => 'E, Treb\'o sam FON',
            'timePosted' => $currTime + 200,
            'isPermanent' => false,
            'isLocked' => false,
            'author' => 1
        ]);
    }
}
