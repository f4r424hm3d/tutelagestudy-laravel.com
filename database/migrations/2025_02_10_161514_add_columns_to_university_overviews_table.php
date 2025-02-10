<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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
      $table->string('slug')->after('title')->nullable();
    });

    // Update existing records with slugified titles
    DB::table('university_overviews')->get()->each(function ($record) {
      DB::table('university_overviews')
        ->where('id', $record->id)
        ->update(['slug' => Str::slug($record->title)]);
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
