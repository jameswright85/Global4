<?php

use App\ContractLength;
use App\BroadbandSpeeds;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LnkSpeedToContractLength extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lnk_speed_to_contract', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_length_id')->index();
            $table->unsignedBigInteger('broadband_speed_id')->index();
            $table->decimal('monthly_cost',8,2);
            $table->decimal('installation_cost', 8,2);
            $table->timestamps();
            $table->foreign('contact_length_id')
                ->references('id')
                ->on('contract_lengths');

            $table->foreign('broadband_speed_id')
                ->references('id')
                ->on('broadband_speeds');
        });

        //generate some figures to display on the front end of the application
        foreach(ContractLength::all() as $length){
            foreach(BroadbandSpeeds::all() as $speed){
                App\LnkSpeedToContract::create([
                    'contact_length_id' => $length->id,
                    'broadband_speed_id' => $speed->id,
                    'monthly_cost' => $speed->id + $length->id,
                    'installation_cost' => $speed->id * $length->id
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lnk_speed_to_contract');
    }
}
