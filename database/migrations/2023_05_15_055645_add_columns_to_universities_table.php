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
    Schema::table('universities', function (Blueprint $table) {
      $table->string('university_name', 150)->nullable()->after('uname');
      $table->string('university_name_slug', 150)->nullable()->after('university_name');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('universities', function (Blueprint $table) {
      //
    });
  }
};
