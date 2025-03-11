<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('exam_papers', function (Blueprint $table) {
      $table->id();
      $table->string('paper_name', 200);
      $table->string('exam_year', 5)->nullable();
      $table->date('date_of_exam')->nullable();
      $table->string('shift')->nullable();
      $table->text('question_paper')->nullable();
      $table->text('answer_key')->nullable();
      $table->unsignedBigInteger('exam_type_id');
      $table->foreign('exam_type_id')->references('id')->on('exam_types');
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
    Schema::dropIfExists('exam_papers');
  }
};
