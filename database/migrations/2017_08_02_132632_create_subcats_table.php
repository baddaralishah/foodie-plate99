<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subCats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('category_id');
            $table->timestamps();

        });

        Schema::table('subCats', function($table) {
            $table->foreign('category_id')->references('id')->on('cats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subCats', function (Blueprint $table) {
            $table->dropForeign('subCats_category_id_foreign');
            $table->dropColumn('category_id');
        });
        Schema::drop('subCats');
    }
}
