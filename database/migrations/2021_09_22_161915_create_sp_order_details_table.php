<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_order_details', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique()->nullable();
            $table->string('currency')->nullable();
            $table->double('amount')->nullable();
            $table->double('payable_amount')->nullable();
            $table->string('discsount_amount')->nullable();
            $table->string('disc_percent')->nullable();
            $table->string('usd_amt')->nullable();
            $table->string('usd_rate')->nullable();
            $table->string('card_holder_name')->nullable();
            $table->string('card_number')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('bank_trx_id')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('bank_status')->nullable();
            $table->string('customer_order_id')->nullable();
            $table->string('sp_code')->nullable();
            $table->string('sp_massage')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('transaction_status')->nullable();
            $table->string('method')->nullable();
            $table->string('date_time')->nullable();
            $table->timestamps();
            $table->tinyInteger('created_by')->nullable();
            $table->tinyInteger('updated_by')->nullable();
            $table->tinyInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sp_order_details');
    }
}
