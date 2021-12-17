<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('albums', function (Blueprint $table) {
          $table->id();
          $table->integer('band_id')->unsigned()->nullable();
          $table->string('name', 100);
          $table->integer('year')->length(4)->nullable();
          $table->string('times_sold', 100);
          $table->timestamps();

          $table->foreign('band_id')->references('id')->on('bands');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album');
    }
}
