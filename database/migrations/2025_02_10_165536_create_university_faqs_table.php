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
    Schema::create('university_faqs', function (Blueprint $table) {
      $table->id();
      $table->text('question');
      $table->longText('answer');
      $table->unsignedBigInteger('university_id');
      $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
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
    Schema::dropIfExists('university_faqs');
  }
};
