<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');

            // The voucher code
            $table->string('code', 30)->unique();

            // The human readable voucher code name
            $table->string('name', 25);
			
			// The prefix of the voucher
            $table->string('prefix', 10);

            // The description of the voucher - Not necessary
            $table->text('description')->nullable();

            // The number of uses currently
            $table->tinyInteger('use_status')->unsigned()->default('0');

            // The type can be: cupon,voucher, discount, sale. What ever you want.
            $table->string('type', 20)->default('cupon');

            // The amount to discount by (in pennies) in this example.
            $table->integer('discount_amount');

            // Whether or not the voucher is a percentage or a fixed price.
            $table->string('is_fixed', 20)->default('fixed');

            // When the voucher begins
            $table->timestamp('starts_at');

            // When the voucher ends
            $table->timestamp('expires_at');

            $table->tinyInteger('created_by')->nullable();
            $table->tinyInteger('deleted_by')->nullable();

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
        Schema::dropIfExists('cupons');
    }
}
