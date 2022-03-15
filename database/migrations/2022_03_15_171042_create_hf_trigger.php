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
        DB::unprepared('
        CREATE TRIGGER hazi BEFORE INSERT ON adattar 
        FOR EACH ROW 
        BEGIN 
            DECLARE regiadat FLOAT DEFAULT NULL; 
            SET regiadat = (SELECT BeolvasottAdat from adattar
            WHERE SzenzorID = new.SzenzorID
            ORDER by created_at DESC LIMIT 1); 
            IF regiadat IS NOT NULL THEN 
                SET new.BeolvasottAdat = (new.BeolvasottAdat - regiadat); 
            END IF; 
        END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hf_trigger');
    }
};
