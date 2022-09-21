<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id('partner_id')->autoIncrement();
            $table->string('name', 100);
            $table->string('phone', 100);
            $table->string('email', 100);
            $table->string('password', 100);
            $table->string('doctor_Name', 100);
            $table->string('doctor_specialty', 100);
            $table->string('doctor_location', 100);
            $table->string('doctor_phone', 100);
            $table->string('token_mobile',100);
            $table->integer('num_patient');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
