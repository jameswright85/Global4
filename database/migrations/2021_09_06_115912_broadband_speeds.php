<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BroadbandSpeeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broadband_speeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('speed_up')->nullable();
            $table->integer('speed_down');
            $table->timestamps();
        });

        App\BroadbandSpeeds::create([
            'name' => 'Unlimited Broadband',
            'speed_up' => 1,
            'speed_down' => 10
        ]);

        App\BroadbandSpeeds::create([
            'name' => 'Superfast & Unlimited Home Fibre',
            'speed_up' => 10,
            'speed_down' => 40
        ]);

        App\BroadbandSpeeds::create([
            'name' => 'Superfast & Unlimited Home Fibre Plus',
            'speed_up' => 11,
            'speed_down' => 55
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('broadband_speeds');
    }
}
