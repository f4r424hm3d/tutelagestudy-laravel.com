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
    Schema::create('service_contents', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('slug');
      $table->longText('description');
      $table->text('image_path');
      $table->integer('position')->default(1);

      $table->unsignedBigInteger('service_id');
      $table->foreign('service_id')
        ->references('id')
        ->on('services')
        ->onDelete('cascade');

      $table->unsignedBigInteger('parent_id')->nullable();
      $table->foreign('parent_id')
        ->references('id')
        ->on('service_contents')
        ->onDelete('cascade');

      $table->timestamps();

      $table->index('service_id');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('service_contents');
  }
};
