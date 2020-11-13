<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companys', function (Blueprint $table) {
            //
            $table->engine = 'InnoDB';
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');

            //adress 
            $table->string('city');
            $table->string('province');
            $table->string('neighbourhood'); // mahalle
            $table->text('address_line1');
            $table->text('address_line2');
            $table->string('postal_code')->nullable();
            //address end 
            $table->string('phone_number');
            $table->text('website');
            $table->text('longlatt')->nullable();
            $table->string('category')->nullable();
            $table->string('logo')->default('placeholder.jpg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companys', function (Blueprint $table) {
            //
        });
    }
}
