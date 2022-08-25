<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamCreatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_creates', function (Blueprint $table) {
            $table->id();
            $table->string('batch_name');
            $table->string('exam_title');
            $table->string('date');
            $table->string('subject_name');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('full_mark');
            $table->string('written')->nullable();
            $table->string('mcq')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->tinyInteger('created_by')->nullable();
            $table->tinyInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_creates');
    }
}
