<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('anaks', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->nullable()->constrained()->ondelete('cascade');
      $table->string('foto')->nullable();
      $table->string('nama')->nullable();
      $table->string('tempat_lahir')->nullable();
      $table->date('tanggal_lahir')->nullable();
      $table->string('jenis_kelamin')->nullable();
      $table->string('darah')->nullable();
      $table->string('data_kelahiran')->nullable();
      $table->string('keterangan')->nullable();
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
    Schema::dropIfExists('anaks');
  }
}
