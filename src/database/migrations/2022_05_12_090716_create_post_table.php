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
        Schema::create('Post', function (Blueprint $table) {
            $table->id('idPost');
            $table->boolean('isPermanent');
            $table->timestamp('timePosted');
            $table->string('heading', 100);
            $table->string('content', 1000);
            $table->unsignedBigInteger('author');
            $table->boolean('isLocked');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Post');
    }
};
