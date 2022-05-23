<?php

// Autor: Vukašin Stepanović

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Vote', function (Blueprint $table) {
            $table->id('idVote');
            $table->unsignedBigInteger('voter');
            $table->unsignedBigInteger('post');
            $table->boolean('value');

            $table->index('voter');
            $table
                ->foreign('voter')
                ->references('idUser')->on('User')
                ->cascadeOnUpdate();

            $table->index('post');
            $table
                ->foreign('post')
                ->references('idPost')->on('Post')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
           $table->unique(['voter', 'post']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('Vote')) {
            Schema::table('Vote', function (Blueprint $table) {
                $table->dropIndex(['voter', 'post']);
                $table->dropForeign(['voter', 'post']);
            });
        }
        Schema::dropIfExists('Vote');
    }
};
