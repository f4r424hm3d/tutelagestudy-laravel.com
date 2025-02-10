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
    Schema::table('university_overviews', function (Blueprint $table) {
      $table->integer('position')->after('image_name')->default(1);
      $table->unsignedBigInteger('parent_id')->after('position')->nullable();
      $table->foreign('parent_id')->references('id')->on('university_overviews');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('university_overviews', function (Blueprint $table) {
      //
    });
  }
};
