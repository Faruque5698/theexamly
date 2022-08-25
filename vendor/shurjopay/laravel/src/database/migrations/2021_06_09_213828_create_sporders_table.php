<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sporders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique()->nullable();
            $table->string('bank_trx_id')->nullable();
            $table->double('amount');
            $table->integer('status')->nullable();
            $table->text('inv_id');
            $table->text('response');
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
        Schema::dropIfExists('sporders');
    }
}
