<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertumbuhansTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pertumbuhans', function (Blueprint $table) {
      $table->id();
      $table->foreignId('anak_id')->nullable()->constrained()->ondelete('cascade');
      $table->string('umur')->nullable();
      $table->decimal('tinggi')->nullable();
      $table->decimal('berat')->nullable();
      $table->decimal('lingkar_kepala')->nullable();
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
    Schema::dropIfExists('pertumbuhans');
  }
}
