<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('batch_name',50);
            $table->string('course_name',50);
            $table->integer('moodle_course_id',20);
            $table->string('subject_name',50);
            $table->string('days');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('room_no',20);
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
        Schema::dropIfExists('batch_schedules');
    }
}
