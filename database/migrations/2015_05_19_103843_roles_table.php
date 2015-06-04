<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function(Blueprint $table)
        {
            $table->integer( 'id', true );
            $table->string( 'name', 20 )->unique();
            $table->boolean( 'is_active' )->default(1);
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table)
        {
            $table->integer( 'role_id' );
            $table->boolean( 'is_active' )->default(1);
            $table->boolean( 'reload' )->default(0);
            $table->timestamp( 'last_login' );
            $table->foreign('role_id')->references('id')->on('roles');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
        Schema::table('users', function(Blueprint $table)
        {
            $table->drop_column( array( 'role_id', 'is_active' ) );
        });
        
    }

}
