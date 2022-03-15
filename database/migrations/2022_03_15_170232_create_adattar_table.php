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
        Schema::create('adattar', function (Blueprint $table) {
            $table->id();
            $table->integer('BeolvasottAdat');
            $table->foreignId('SzenzorID')->constrained('szenzor');
            $table->foreignId('UzemID')->constrained('uzemek');
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
        Schema::dropIfExists('adattar');
    }
};
