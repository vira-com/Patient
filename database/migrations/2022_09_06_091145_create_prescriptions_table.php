<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id('prescription_id')->autoIncrement();
            $table->integer('partner_id');
            $table->integer('drugstore_id');
            $table->string('patient_code',100)->nullable();
            $table->integer('cost')->nullable();
            $table->integer('tracking_code')->nullable();
            $table->string('source_img_path',300)->nullable();
            $table->string('bimeh',300);
            $table->string('status',300);
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
        Schema::dropIfExists('prescriptions');
    }
}
