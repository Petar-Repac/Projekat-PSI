<?php

// Autor: Vukašin Stepanović

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Role', function (Blueprint $table) {
            $table->id('idRole');
            $table->string('name', 45);
            $table->integer('privilege');
        });

        // TODO: Izmeni privilegije
        DB::table('Role')->insert([
            ['name' => 'user', 'privilege' => 0],
            ['name' => 'moderator', 'privilege' => 0],
            ['name' => 'administrator', 'privilege' => 0],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Role');
    }
};
