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
    Schema::table('destination_page_contents', function (Blueprint $table) {
      $table->string('slug')->after('title');
      $table->unsignedBigInteger('parent_id')->nullable()->after('priority');
      $table->foreign('parent_id')
        ->references('id')
        ->on('destination_page_contents')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('destination_page_contents', function (Blueprint $table) {
      //
    });
  }
};
