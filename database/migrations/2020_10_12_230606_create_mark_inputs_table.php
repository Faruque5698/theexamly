<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_inputs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('student_id');
            $table->string('batch_name');
            $table->string('subject_name');
            $table->string('exam_title');
            $table->string('written');
            $table->string('mcq');
            $table->string('total_mark');
            $table->string('result');
            $table->string('grade');
            $table->string('point');
            $table->string('merit_list');
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
        Schema::dropIfExists('mark_inputs');
    }
}
