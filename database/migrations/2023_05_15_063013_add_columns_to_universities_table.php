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
      $table->text('brochure_name', 150)->nullable()->after('imgpath');
      $table->text('brochure_path', 150)->nullable()->after('brochure_name');
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
