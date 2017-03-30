<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1490795920CellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('cells')) {
            Schema::create('cells', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_25750_user_user_id_cell')->references('id')->on('users')->onDelete('cascade');
                $table->integer('church_id')->unsigned()->nullable();
                $table->foreign('church_id', 'fk_25749_role_church_id_cell')->references('id')->on('roles')->onDelete('cascade');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cells');
    }
}
