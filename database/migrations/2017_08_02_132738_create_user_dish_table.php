<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareekhs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city');
            $table->string('location');
            $table->unsignedInteger('uploader_id');
            $table->unsignedInteger('dish_id');
            $table->enum('status', ['active', 'deactive']);
            $table->timestamps();

           // $table->foreign('commenter_id')->references('id')->on('comments');
        });

        Schema::table('tareekhs', function($table) {
            $table->foreign('uploader_id')->references('id')->on('users');
            $table->foreign('dish_id')->references('id')->on('dishes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tareekhs', function (Blueprint $table) {

            $table->dropForeign('tareekhs_uploader_id_foreign');
            $table->dropColumn('uploader_id');


            $table->dropForeign('tareekhs_dish_id_foreign');
            $table->dropColumn('dish_id');
        });
        Schema::drop('tareekhs');
        Schema::drop('users');
    }
}
