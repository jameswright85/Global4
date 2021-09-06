<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('broadband_speed_id')->index();
            $table->unsignedBigInteger('contract_length_id')->index();
            $table->date('contact_start_date');
            $table->date('contact_end_date');
            $table->decimal('monthly_cost',8,2);
            $table->decimal('installation_cost', 8,2);
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('broadband_speed_id')
                ->references('id')
                ->on('broadband_speeds');

            $table->foreign('contract_length_id')
                ->references('id')
                ->on('contract_lengths');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_orders');
    }
}
