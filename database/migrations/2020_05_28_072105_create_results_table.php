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
            $table->foreignId('exam_id')->constrained();
            $table->unsignedInteger('total_questions');
            $table->unsignedInteger('max_marks');
            $table->unsignedInteger('total_attempted');
            $table->unsignedInteger('correct_answers');
            $table->unsignedInteger('total_time');
            $table->string('time_taken', 10);
            $table->unsignedInteger('right_marks');
            $table->unsignedInteger('negative_marks');
            $table->json('answers');
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
        Schema::dropIfExists('results');
    }
}
