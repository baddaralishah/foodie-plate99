<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->unsignedInteger('sub_category_id');
            $table->enum('status', ['active', 'deactive']);
            $table->enum('upload_type', ['share', 'recepie']);
            $table->timestamps();

        });

        Schema::table('dishes', function($table) {
            $table->foreign('sub_category_id')->references('id')->on('subCats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dishes', function(Blueprint $table){

            $table->dropForeign('dishes_sub_category_id_foreign');
            $table->dropColumn('sub_category_id');
            //$table->dropPrimary();
        });
        Schema::drop('dishes');
    }
}
