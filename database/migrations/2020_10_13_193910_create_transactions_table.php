<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('tran_id',30)->unique()->nullable();
            $table->string('val_id',50)->nullable();
            $table->float('amount',16,2)->unsigned()->nullable();
            $table->string('card_type',50)->nullable();
            $table->float('store_amount',16,2)->unsigned()->nullable();
            $table->string('card_no',30)->nullable();
            $table->string('bank_tran_id',50)->nullable();
            $table->string('status',255)->nullable();
            $table->string('tran_date',255)->nullable();
            $table->string('currency',3)->nullable();
            $table->string('card_issuer',50)->nullable();
            $table->string('card_brand',30)->nullable();
            $table->string('card_issuer_country',50)->nullable();
            $table->string('card_issuer_country_code',2)->nullable();
            $table->string('store_id')->nullable();
            $table->string('verify_sign',255)->nullable();
            $table->longText('verify_key')->nullable();
            $table->string('cus_fax')->nullable();
            $table->string('verify_sign_sha2',255)->nullable();
            $table->string('currency_type',3)->nullable();
            $table->float('currency_amount',16,2)->unsigned()->nullable();
            $table->float('currency_rate',8,4)->unsigned()->nullable();
            $table->float('base_fair',8,4)->unsigned()->nullable();
            $table->string('value_a',255)->nullable();
            $table->string('value_b',255)->nullable();
            $table->string('value_c',255)->nullable();
            $table->string('value_d',255)->nullable();
            $table->integer('risk_level')->nullable();
            $table->string('risk_title',50)->nullable();
            $table->string('error')->nullable();
            $table->longText('key')->nullable();
            $table->string('pass')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
}
