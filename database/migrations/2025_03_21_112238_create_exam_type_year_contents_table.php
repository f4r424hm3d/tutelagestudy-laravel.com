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
    Schema::create('exam_type_year_contents', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('slug');
      $table->longText('description');
      $table->text('image_path');
      $table->integer('position')->default(1);

      $table->unsignedBigInteger('exam_type_year_id');
      $table->foreign('exam_type_year_id')->references('id')->on('exam_type_years')->onDelete('cascade');

      $table->unsignedBigInteger('parent_id')->nullable();
      $table->foreign('parent_id')->references('id')->on('exam_type_year_contents')->onDelete('cascade');

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
    Schema::dropIfExists('exam_type_year_contents');
  }
};
