<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_students', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('student_id');
            $table->integer('roll_no');
            $table->string('batch_id');
            $table->date('admission_date');
            $table->string('description')->nullable();
            $table->string('course_fee')->nullable();
            $table->string('paymented_amount')->nullable();
            $table->string('due_amount')->nullable();
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
        Schema::dropIfExists('batch_students');
    }
}
