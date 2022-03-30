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
        CREATE TRIGGER hazi BEFORE INSERT ON data
        FOR EACH ROW 
        BEGIN 
            DECLARE olddata FLOAT DEFAULT NULL; 
            SET olddata = (SELECT scandata from data
            WHERE sensor_id = new.sensor_id
            ORDER by created_at DESC LIMIT 1); 
            IF olddata IS NOT NULL THEN 
                SET new.scandata = (new.scandata - olddata); 
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
