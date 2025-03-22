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
    Schema::table('default_seos', function (Blueprint $table) {
      $table->after('description', function (Blueprint $table) {
        $table->decimal('seo_rating', 2, 1)->nullable();
        $table->integer('review_number')->nullable();
        $table->decimal('best_rating', 2, 1)->nullable();
        $table->text('og_image_path')->nullable();
      });
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('default_seos', function (Blueprint $table) {
      $table->dropColumn([
        'seo_rating',
        'review_number',
        'best_rating',
        'og_image_path'
      ]);
    });
  }
};
