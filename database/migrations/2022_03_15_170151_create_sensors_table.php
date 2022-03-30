<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('machine_id');
            $table->unsignedBigInteger('datatype_id');
            $table->timestamps();
            $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('datatype_id')->references('id')->on('datatypes')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor');
    }
};
