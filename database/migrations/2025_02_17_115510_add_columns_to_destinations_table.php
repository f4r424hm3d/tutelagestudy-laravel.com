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
    Schema::table('destinations', function (Blueprint $table) {
      $table->text('destination_image')->after('thumbnail')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('destinations', function (Blueprint $table) {
      $table->dropColumn('destination_image');
    });
  }
};
