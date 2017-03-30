<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1490797458PartnershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('partnerships')) {
            Schema::create('partnerships', function (Blueprint $table) {
                $table->increments('id');
                $table->string('type')->nullable();
                $table->decimal('amount', 15, 2)->nullable();
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_25750_user_user_id_partnership')->references('id')->on('users')->onDelete('cascade');
                $table->integer('church_id')->unsigned()->nullable();
                $table->foreign('church_id', 'fk_25891_church_church_id_partnership')->references('id')->on('churches')->onDelete('cascade');
                
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
        Schema::dropIfExists('partnerships');
    }
}
