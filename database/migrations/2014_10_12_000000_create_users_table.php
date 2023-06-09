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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('supervisor_id');
            $table->string('name');
            $table->string('cargo'); 
            $table->string('tell');
            $table->string('tell2');
            $table->string('cpf');
            $table->string('birthday');
            $table->string('cep');
            $table->string('bairro');
            $table->string('logradouro');
            $table->string('complemento');
            $table->string('num_fachada');
            $table->string('password');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
