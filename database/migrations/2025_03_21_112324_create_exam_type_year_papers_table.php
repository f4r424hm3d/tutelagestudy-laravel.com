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
    Schema::create('exam_type_year_papers', function (Blueprint $table) {
      $table->id();
      $table->string('paper_name');
      $table->string('slug');
      $table->text('question_paper');
      $table->text('answer_key');
      $table->unsignedBigInteger('exam_type_year_id');
      $table->foreign('exam_type_year_id')->references('id')->on('exam_type_years')->onDelete('cascade');
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
    Schema::dropIfExists('exam_type_year_papers');
  }
};
