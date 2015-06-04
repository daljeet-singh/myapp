<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PrivilegesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function(Blueprint $table)
        {
            $table->integer( 'id', true );
            $table->integer( 'role_id' );
            $table->string( 'controller', 20 );
            $table->string( 'action', 20 );
            $table->boolean( 'is_active' )->default(1);
            $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::drop('privileges');        
    }

}
