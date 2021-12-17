<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bands', function (Blueprint $table) {
          $table->id();
          $table->string('name', 100);
          $table->string('genre', 100);
          $table->year('founded')->nullable();
          $table->string('active_til', 100)->default('heden');
          $table->dateTime('created_at');
          $table->dateTime('updated_at');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('band');
    }
}
