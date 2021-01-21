<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',60);
            $table->enum('type',['anonymous','registered'])->default('anonymous');
            $table->string('full_name',100);
            $table->string('email',100)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('password',100)->nullable();
            $table->string('photo',100)->nullable();
            $table->text('address',100)->nullable();
            $table->string('city',100)->nullable();
            $table->integer('zip_code')->default(0);
            $table->enum('gender',['male','female','others'])->nullable();
            $table->datetime('dob')->nullable();
            $table->enum('status',['active','inactive','delete'])->default('active');
            $table->enum('verify_status',['yes','no'])->default('no');
            $table->datetime('registration_date')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
