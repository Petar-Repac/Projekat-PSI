<!-- Autor: Vukašin Stepanović -->

<?php

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
        Schema::create('Comment', function (Blueprint $table) {
            $table->id('idComment');
            $table->unsignedBigInteger('commenter')->nullable();
            $table->unsignedBigInteger('post');
            $table->string('content', 1000);
            $table->timestamp('timeCreated');

            $table->index('commenter');
            $table
                ->foreign('commenter')
                ->references('idUser')->on('User')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->index('post');
            $table
                ->foreign('post')
                ->references('idPost')->on('Post')
                ->cascadeOnDelete()
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
        if (Schema::hasTable('Comment')) {
            Schema::table('Comment', function (Blueprint $table) {
                $table->dropIndex(['commenter', 'post']);
                $table->dropForeign(['commenter', 'post']);
            });
        }
        Schema::dropIfExists('Comment');
    }
};
