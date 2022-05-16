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
        Schema::create('Post', function (Blueprint $table) {
            $table->id('idPost');
            $table->boolean('isPermanent');
            $table->timestamp('timePosted');
            $table->string('heading', 100);
            $table->string('content', 1000);
            $table->unsignedBigInteger('author')->nullable();
            $table->boolean('isLocked');

            $table->index('author');
            $table
                ->foreign('author')
                ->references('idUser')->on('User')
                ->nullOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('Post')) {
            Schema::table('Post', function (Blueprint $table) {
                $table->dropIndex(['author']);
                $table->dropForeign(['author']);
            });
        }
        Schema::dropIfExists('Post');
    }
};
