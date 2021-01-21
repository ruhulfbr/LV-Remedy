<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorTimeSlotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_time_slot', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('doctor_id')->nullable();
            $table->string('slot_day',100)->nullable();
            $table->string('slot_time',100)->nullable();
            $table->enum('status',['active','inactive','delete'])->default('active');
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
        Schema::dropIfExists('doctor_time_slot');
    }
}
