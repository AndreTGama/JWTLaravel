<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('tipo_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_user');
            $table->timestamps();
        });
        Schema::table('users', function($table) {
            $table->bigInteger('tipo_user_id')->unsigned()->index();
            $table->foreign('tipo_user_id')
                    ->references('id')->on('tipo_users')
                    ->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_users');
    }
}
