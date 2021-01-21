<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('full_name',100);
            $table->string('email',100)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('password',100)->nullable();
            $table->string('photo',100)->nullable();
            $table->string('category',512)->nullable();
            $table->string('qualification',1024)->nullable();
            $table->string('current_workplace',512)->nullable();
            $table->string('current_workplace_designation',512)->nullable();
            $table->string("specialized",512)->nullable();
            $table->enum('status',['active','inactive','delete'])->default('active');
            $table->datetime('last_login')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
