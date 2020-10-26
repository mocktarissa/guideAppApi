<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PoiAddPicture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pois', function (Blueprint $table) {
            //

            $table->string('picture1')->default('placeholder.jpg');
            $table->string('picture2')->default('placeholder.jpg');
            $table->string('picture3')->default('placeholder.jpg');
            $table->string('picture4')->default('placeholder.jpg');
            $table->string('picture5')->default('placeholder.jpg');
            $table->string('picture6')->default('placeholder.jpg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pois', function (Blueprint $table) {
            //
        });
    }
}
