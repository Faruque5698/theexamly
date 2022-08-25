<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('degree',15)->nullable();
            $table->string('institution')->nullable();
            $table->string('group',30)->nullable();
            $table->string('result',15)->nullable();
            $table->string('total_mark',20)->nullable();
            $table->string('passingYear',15)->nullable();
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
        Schema::dropIfExists('results');
    }
}
