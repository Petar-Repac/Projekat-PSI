<?php
//Autor: Petar Repac
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use  \App\Models\User;
use  \App\Models\Post;
use  \App\Models\Vote;
use  \App\Models\Comment;
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

        //Admin
        User::create([
            'username' => env('TOBAGO_ADMIN_USERNAME'),
            'password' => Hash::make(env('TOBAGO_ADMIN_PASSWORD')),
            'role' => Role::admin()->idRole,
            'isBanned' => false,
            'status' => 'Regional manager',
            'postStatus' => 0,
        ]);

        //Moderator
        User::create([
            'username' => 'mod',
            'password' => Hash::make('tobago123'),
            'role' => Role::mod()->idRole,
            'isBanned' => false,
            'status' => 'Assistant TO the regional manager',
            'postStatus' => 0,
        ]);

        //Korisnici
        User::create([
            'username' => 'Sturm',
            'password' => Hash::make('tobago123'),
            'role' => Role::user()->idRole,
            'isBanned' => false,
            'postStatus' => 1,
        ]);

        User::create([
            'username' => 'Tobago',
            'password' => Hash::make('tobago123'),
            'role' => Role::user()->idRole,
            'isBanned' => false,
            'status' => '🕷 🕷 🕷',
            'postStatus' => 1,
        ]);
        User::create([
            'username' => 'Asha20',
            'password' => Hash::make('tobago123'),
            'role' => Role::user()->idRole,
            'isBanned' => false,
            'status' => 'JS Wizard, tetris crackhead',
            'postStatus' => 1,
        ]);
        User::create([
            'username' => 'SlavicLeshy',
            'password' => Hash::make('tobago123'),
            'role' => Role::user()->idRole,
            'isBanned' => false,
            'status' => 'Violence enjoyer',
            'postStatus' => 1,
        ]);
        User::create([
            'username' => 'Walter',
            'password' => Hash::make('tobago123'),
            'role' => Role::user()->idRole,
            'isBanned' => false,
            'status' => 'Branim Sarajevo',
            'postStatus' => 0,
        ]);
        User::create([
            'username' => 'Ćeđor',
            'password' => Hash::make('tobago123'),
            'role' => Role::user()->idRole,
            'isBanned' => false,
            'status' => '🐤',
            'postStatus' => 1,
        ]);
        User::create([
            'username' => 'Trinidad',
            'password' => Hash::make('tobago123'),
            'role' => Role::user()->idRole,
            'isBanned' => false,
            'status' => '🏝 🏝 🏝',
            'postStatus' => 1,
        ]);
        User::create([
            'username' => 'RickAstley',
            'password' => Hash::make('tobago123'),
            'role' => Role::user()->idRole,
            'isBanned' => false,
            'status' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'postStatus' => 0,
        ]);
        User::create([
            'username' => 'DaftPunk',
            'password' => Hash::make('tobago123'),
            'role' => Role::user()->idRole,
            'isBanned' => false,
            'status' => 'around the world around the world around the world around the world around the world',
            'postStatus' => 1,
        ]);
        User::create([
            'username' => 'Banovan',
            'password' => Hash::make('tobago123'),
            'role' => Role::user()->idRole,
            'isBanned' => true,
            'status' => 'Banovan zbog zločina protiv čovečnosti',
            'postStatus' => 1,
        ]);


        //Objave
        $today = Carbon::now()->timestamp;
        $yesterday = Carbon::now()->subDays(1)->timestamp;
        $longTimeAgo = Carbon::now()->subDays(12)->timestamp;
        Post::create([
            'heading' => 'Razumna pretpostavka',
            'content' => 'Mit. Na ETF-u ne postoji razum.',
            'timePosted' => $today,
            'isPermanent' => false,
            'isLocked' => false,
            'author' => 3,
        ]);
        //Glasovi
        Vote::create([
            'voter' => 1,
            'post' => 1,
            'value' => 1,
        ]);
        Vote::create([
            'voter' => 2,
            'post' => 1,
            'value' => 1,
        ]);
        Vote::create([
            'voter' => 3,
            'post' => 1,
            'value' => 1,
        ]);
        Vote::create([
            'voter' => 4,
            'post' => 1,
            'value' => 1,
        ]);
        Vote::create([
            'voter' => 5,
            'post' => 1,
            'value' => -1,
        ]);

        Comment::create([
            'commenter' => 1,
            'post' => 1,
            'content' => 'Razumna pretpostavka makes the world go round!',
            'timeCreated' => $today,
        ]);

        Post::create([
            'heading' => 'Računarski centar',
            'content' => 'Pogresan naziv za računski centar :) ',
            'timePosted' => $today - rand(10, 3600),
            'isPermanent' => false,
            'isLocked' => false,
            'author' => 4,
        ]);

        //Glasovi
        Vote::create([
            'voter' => 4,
            'post' => 2,
            'value' => -1,
        ]);
        Vote::create([
            'voter' => 5,
            'post' => 2,
            'value' => -1,
        ]);
        Vote::create([
            'voter' => 6,
            'post' => 2,
            'value' => -1,
        ]);
        Vote::create([
            'voter' => 7,
            'post' => 2,
            'value' => -1,
        ]);
        Vote::create([
            'voter' => 8,
            'post' => 2,
            'value' => 1,
        ]);

        Comment::create([
            'commenter' => 8,
            'post' => 2,
            'content' => 'Tobego Tobago',
            'timeCreated' => $today,
        ]);
        Post::create([
            'heading' => 'ETF',
            'content' => 'E, Treb\'o sam FON',
            'timePosted' => $today - rand(10, 3600),
            'isPermanent' => false,
            'isLocked' => false,
            'author' => 5,
        ]);

        //Glasovi
        Vote::create([
            'voter' => 5,
            'post' => 3,
            'value' => 1,
        ]);
        Vote::create([
            'voter' => 6,
            'post' => 3,
            'value' => 1,
        ]);
        Vote::create([
            'voter' => 2,
            'post' => 3,
            'value' => 1,
        ]);
        Vote::create([
            'voter' => 10,
            'post' => 3,
            'value' => -1,
        ]);
        Vote::create([
            'voter' => 1,
            'post' => 3,
            'value' => 1,
        ]);

        Comment::create([
            'commenter' => 7,
            'post' => 3,
            'content' => 'Da budem menadžer i posle se zaposlim u fabrici menadžmenta!',
            'timeCreated' => $today,
        ]);

        Post::create([
            'heading' => 'Projekat iz OS1',
            'content' => 'Koncentrisana agonija predstavljena kao predispitna obaveza.',
            'timePosted' => $today - rand(10, 3600),
            'isPermanent' => false,
            'isLocked' => false,
            'author' => 6,
        ]);
        //Glasovi
        Vote::create([
            'voter' => 2,
            'post' => 4,
            'value' => 1,
        ]);
        Vote::create([
            'voter' => 11,
            'post' => 4,
            'value' => 1,
        ]);
        Vote::create([
            'voter' => 1,
            'post' => 4,
            'value' => 1,
        ]);
        Comment::create([
            'commenter' => 2,
            'post' => 4,
            'content' => ':(',
            'timeCreated' => $today,
        ]);
        Comment::create([
            'commenter' => 9,
            'post' => 4,
            'content' => ':(',
            'timeCreated' => $today,
        ]);
        Comment::create([
            'commenter' => 4,
            'post' => 4,
            'content' => ':(',
            'timeCreated' => $today,
        ]);




        Post::create([
            'heading' => 'Kolega, ovo je trivijalno',
            'content' => 'Izjava vredna recitovanja pesme o psu, ljubavi i majci.',
            'timePosted' => $yesterday - rand(10, 3600),
            'isPermanent' => true,
            'isLocked' => false,
            'author' => 7
        ]);

        //Glasovi
        Vote::create([
            'voter' => 2,
            'post' => 5,
            'value' => 1
        ]);
        Vote::create([
            'voter' => 3,
            'post' => 5,
            'value' => 1
        ]);
        Vote::create([
            'voter' => 4,
            'post' => 5,
            'value' => 1
        ]);
        Vote::create([
            'voter' => 6,
            'post' => 5,
            'value' => 1
        ]);
        Vote::create([
            'voter' => 9,
            'post' => 5,
            'value' => 1
        ]);
        Vote::create([
            'voter' => 11,
            'post' => 5,
            'value' => 1
        ]);

        Comment::create([
            'commenter' => 10,
            'post' => 5,
            'content' => 'Ili što bi rekao Rambo Amadeus: Prijatelju, prijateljuu..',
            'timeCreated' => $today,
        ]);

        Comment::create([
            'commenter' => 2,
            'post' => 5,
            'content' => 'Danas na ASP2 učimo trivijalna stabla pretrage :D',
            'timeCreated' => $today,
        ]);



        Post::create([
            'heading' => 'Poništio devetku',
            'content' => 'Simptom poslednjeg stadijuma encefalopatije',
            'timePosted' => $today - rand(10, 3600),
            'isPermanent' => false,
            'isLocked' => false,
            'author' => 8
        ]);

        Vote::create([
            'voter' => 6,
            'post' => 6,
            'value' => 1
        ]);
        Vote::create([
            'voter' => 9,
            'post' => 6,
            'value' => -1
        ]);
        Vote::create([
            'voter' => 11,
            'post' => 6,
            'value' => -1
        ]);

        Comment::create([
            'commenter' => 6,
            'post' => 6,
            'content' => 'haha brain rot funni',
            'timeCreated' => $today,
        ]);

        Post::create([
            'heading' => 'Goli Otok',
            'content' => 'Mesto za ljude koji klikću hemijskom i cupkaju nogom za vreme ispita.',
            'timePosted' => $today - rand(10, 3600),
            'isPermanent' => false,
            'isLocked' => false,
            'author' => 9
        ]);
        Vote::create([
            'voter' => 9,
            'post' => 7,
            'value' => 1
        ]);
        Vote::create([
            'voter' => 11,
            'post' => 7,
            'value' => 1
        ]);

        Post::create([
            'heading' => 'Cyber Sex',
            'content' => 'Cyber šta??',
            'timePosted' => $longTimeAgo - rand(10, 3600),
            'isPermanent' => true,
            'isLocked' => false,
            'author' => 10
        ]);

        Vote::create([
            'voter' => 1,
            'post' => 8,
            'value' => 1
        ]);
        Vote::create([
            'voter' => 11,
            'post' => 8,
            'value' => 1
        ]);

        Vote::create([
            'voter' => 2,
            'post' => 8,
            'value' => 1
        ]);
        Vote::create([
            'voter' => 3,
            'post' => 8,
            'value' => 1
        ]);

        Vote::create([
            'voter' => 4,
            'post' => 8,
            'value' => 1
        ]);
        Vote::create([
            'voter' => 5,
            'post' => 8,
            'value' => -1
        ]);

        Vote::create([
            'voter' => 6,
            'post' => 8,
            'value' => 1
        ]);
        Vote::create([
            'voter' => 7,
            'post' => 8,
            'value' => -1
        ]);


        Comment::create([
            'commenter' => 2,
            'post' => 8,
            'content' => ':(',
            'timeCreated' => $today,
        ]);
        Comment::create([
            'commenter' => 9,
            'post' => 8,
            'content' => ':(',
            'timeCreated' => $today,
        ]);
        Comment::create([
            'commenter' => 3,
            'post' => 8,
            'content' => ':(',
            'timeCreated' => $today,
        ]);
        Comment::create([
            'commenter' => 7,
            'post' => 8,
            'content' => ':(',
            'timeCreated' => $today,
        ]);
        Comment::create([
            'commenter' => 8,
            'post' => 8,
            'content' => ':(',
            'timeCreated' => $today,
        ]);
        Comment::create([
            'commenter' => 1,
            'post' => 8,
            'content' => ':(',
            'timeCreated' => $today,
        ]);

        Post::create([
            'heading' => 'Kavujlija',
            'content' => 'U potpunosti originalna ideja. Nikakve veze nema sa Vukajlijom. P.S. Živeo TOBAGO!',
            'timePosted' => $today - rand(10, 3600),
            'isPermanent' => false,
            'isLocked' => false,
            'author' => 11
        ]);

        Vote::create([
            'voter' => 4,
            'post' => 9,
            'value' => 1
        ]);
        Vote::create([
            'voter' => 5,
            'post' => 9,
            'value' => -1
        ]);

        Vote::create([
            'voter' => 6,
            'post' => 9,
            'value' => 1
        ]);
        Vote::create([
            'voter' => 7,
            'post' => 9,
            'value' => -1
        ]);

        Comment::create([
            'commenter' => 1,
            'post' => 9,
            'content' => 'Vive la TOBAGO!',
            'timeCreated' => $today,
        ]);
        Comment::create([
            'commenter' => 5,
            'post' => 9,
            'content' => 'TOBAGO eterna e sua vitoria!',
            'timeCreated' => $today,
        ]);
        Comment::create([
            'commenter' => 6,
            'post' => 9,
            'content' => 'TOBAGO Banzai!',
            'timeCreated' => $today,
        ]);
        Comment::create([
            'commenter' => 7,
            'post' => 9,
            'content' => 'Za Tobago i Kavujliju!',
            'timeCreated' => $today,
        ]);
    }
}