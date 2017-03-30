<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1490796939TestimoniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('testimonies')) {
            Schema::create('testimonies', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->nullable();
                $table->text('body')->nullable();
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_25750_user_user_id_testimony')->references('id')->on('users')->onDelete('cascade');
                
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
        Schema::dropIfExists('testimonies');
    }
}
