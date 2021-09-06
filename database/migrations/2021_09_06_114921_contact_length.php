<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactLength extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_lengths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('months')->unique();
            $table->timestamps();
        });

        App\ContractLength::create([
            'name' => '1 Month',
            'months' => 1
        ]);

        App\ContractLength::create([
            'name' => '6 Months',
            'months' => 6
        ]);

        App\ContractLength::create([
            'name' => '12 Months',
            'months' => 12
        ]);

        App\ContractLength::create([
            'name' => '18 Months',
            'months' => 18
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_lengths');
    }
}
