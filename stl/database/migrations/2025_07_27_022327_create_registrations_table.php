<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('complete_name');
            $table->string('username');
            $table->string('phone_number');
            $table->string('password'); // store as hashed
            $table->string('location'); // province
            $table->string('area_location'); // municipality
            $table->string('area_name');
            $table->string('position');
            $table->string('status')->default('active'); // added status with default
            $table->timestamps();
        });
    }
};
