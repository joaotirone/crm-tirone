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
        Schema::create('permissions_roles', function(Blueprint $table){
            $table->id();
            $table->timestamps();


            $table->bigInteger('permission_id')->unsigned();
            $table->foreign('permission_id')
                    ->references('id')
                    ->on('permissions')->onDelete('cascade');
            
            $table->bigInteger('role_id')->unsigned();
            $table->foreign('role_id')
                    ->references('id')
                            ->on('roles')->onDelete('cascade');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExitests('permissions_roles');
    }
};
