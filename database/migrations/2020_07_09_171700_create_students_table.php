<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('moodle_user_id',20);
            $table->string('short_name',15);
            $table->string('primary_contact_no');
            $table->integer('roll_no');
            $table->string('student_id')->nullable();
            $table->string('father_name',50);
            $table->string('fa_occupation')->nullable();
            $table->string('fa_phone');
            $table->string('fa_email')->nullable();
            $table->string('fa_nid')->nullable();
            $table->string('mother_name');
            $table->string('ma_occupation')->nullable();
            $table->string('ma_phone');
            $table->string('ma_email')->nullable();
            $table->string('ma_nid')->nullable();
            $table->text('present_address');
            $table->text('permanent_address');
            $table->string('district')->nullable();
            $table->string('thana')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('local_guardian')->nullable();
            $table->string('relation')->nullable();
            $table->string('local_phone')->nullable();
            $table->text('local_address')->nullable();
            $table->string('local_email')->nullable();
            $table->string('school_name')->nullable();
            $table->string('school_roll_no')->nullable();
            $table->string('class')->nullable();
            $table->string('school_district')->nullable();
            $table->string('school_thana')->nullable();
            $table->string('result_1')->nullable();
            $table->string('result_2')->nullable();
            $table->string('result_3')->nullable();
            $table->string('result_4')->nullable();
            $table->string('batch_id')->nullable();
            $table->string('image')->nullable();
            $table->softDeletes();
            $table->timestamps();
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
        Schema::dropIfExists('students');
    }
}
