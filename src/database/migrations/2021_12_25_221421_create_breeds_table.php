<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeds', function (Blueprint $table) {            
            $table->string('id');
            $table->string('name');
            // $table->string('temperament');
            // $table->string('life_span');
            // $table->string('alt_names');
            // $table->string('wikipedia_url');
            // $table->string('origin');
            // $table->string('weight_imperial');
            // $table->integer('experimental');
            // $table->integer('hairless');
            // $table->integer('natural');
            // $table->integer('rare');    
            // $table->integer('rex');
            // $table->integer('suppress_tail');
            // $table->integer('short_legs');
            // $table->integer('hypoallergenic');
            // $table->integer('adaptability');
            // $table->integer('affection_level');
            // $table->string('country_code');
            // $table->integer('child_friendly');
            // $table->integer('dog_friendly');
            // $table->integer('energy_level');
            // $table->integer('grooming');
            // $table->integer('health_issues');
            // $table->integer('intelligence');
            // $table->integer('shedding_level');
            // $table->integer('social_needs');
            // $table->integer('stranger_friendly');
            // $table->integer('vocalisation');
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
        Schema::dropIfExists('breeds');
    }
}
