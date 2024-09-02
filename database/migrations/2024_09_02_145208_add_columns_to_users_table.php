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
    Schema::table('users', function (Blueprint $table) {
      $table->string('token')->after('password')->nullable();
      $table->string('remember_token')->after('token')->nullable();
      $table->string('otp_expire_at', 50)->after('otp')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn('token');
      $table->dropColumn('remember_token');
      $table->dropColumn('otp_expire_at');
    });
  }
};
