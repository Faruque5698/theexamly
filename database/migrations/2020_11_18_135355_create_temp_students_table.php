<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_students', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('student_id');
            $table->integer('roll_no');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('course_name');
            $table->string('batch_name');
            $table->string('course_fee');
            $table->string('payment_amount')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('admission_date');
            $table->string('user_type');
            $table->string('user_role');
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
        Schema::dropIfExists('temp_students');
    }
}
