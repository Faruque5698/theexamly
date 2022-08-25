<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_coupon', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer( 'user_id' )->unsigned();
			$table->string( 'student_id',20)->nullable();
			$table->bigInteger( 'coupon_id' )->unsigned()->nullable();
			$table->text('description')->nullable();
			$table->unique(['user_id', 'coupon_id']);
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
        Schema::dropIfExists('user_coupon');
    }
}
