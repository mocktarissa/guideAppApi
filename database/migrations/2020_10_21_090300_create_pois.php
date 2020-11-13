<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePois extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pois', function (Blueprint $table) {
            //
            $table->engine = 'InnoDB';
            $table->id();
            $table->timestamps();
            $table->foreignId('company_id')->constrained('companys');
            $table->string('name');
            $table->text('location');
            $table->text('description');
            $table->text('url')->unique();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('picture1')->default('https://myguideapipictures.s3.eu-central-1.amazonaws.com/pictures/placeholder-image.png');
            $table->string('picture2')->default('https://myguideapipictures.s3.eu-central-1.amazonaws.com/pictures/placeholder-image.png');
            $table->string('picture3')->default('https://myguideapipictures.s3.eu-central-1.amazonaws.com/pictures/placeholder-image.png');
            $table->string('picture4')->default('https://myguideapipictures.s3.eu-central-1.amazonaws.com/pictures/placeholder-image.png');
            $table->string('picture5')->default('https://myguideapipictures.s3.eu-central-1.amazonaws.com/pictures/placeholder-image.png');
            $table->string('picture6')->default('https://myguideapipictures.s3.eu-central-1.amazonaws.com/pictures/placeholder-image.png');
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
