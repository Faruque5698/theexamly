<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyFeeSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_fee_sets', function (Blueprint $table) {
            $table->id();
            $table->string('course_id')->nullable();
            $table->string('admission_fee')->nullable();
            $table->string('monthly_fee')->nullable();
            $table->string('last_payment_date')->nullable();
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
        Schema::dropIfExists('monthly_fee_sets');
    }
}
