<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchDayTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch__day__times', function (Blueprint $table) {
            $table->id();
            $table->string('batch_id');
            $table->string('day', 10);
            $table->date('date')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->string('room_no', 20)->nullable();
            $table->string('teacher_id')->nullable();
            $table->string('subject_id')->nullable();
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
        Schema::dropIfExists('batch__day__times');
    }
}
