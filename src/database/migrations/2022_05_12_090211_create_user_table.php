<!-- Autor: Vukašin Stepanović -->

<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User', function (Blueprint $table) {
            $table->id('idUser');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('status')->nullable();
            $table->unsignedBigInteger('role');
            $table->boolean('isBanned');
            $table->rememberToken();

            $table->index('role');
            $table
                ->foreign('role')
                ->references('idRole')->on('Role')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });

        DB::table('User')->insert([
            [
                'username' => env('TOBAGO_ADMIN_USERNAME'),
                'password' => Hash::make(env('TOBAGO_ADMIN_PASSWORD')),
                'role' => Role::admin()->idRole,
                'isBanned' => false,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('User')) {
            Schema::table('User', function (Blueprint $table) {
                $table->dropIndex(['role']);
                $table->dropForeign(['role']);
            });
        }
        Schema::dropIfExists('User');
    }
};
