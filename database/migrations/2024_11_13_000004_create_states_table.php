<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->char('id', 36)->primary();  // Use CHAR(36) instead of uuid()
            $table->char('country_id', 36)->nullable();  // Use CHAR(36) instead of uuid()
            $table->string('name', 250)->nullable();
            $table->timestamps();

            // Foreign key for country_id
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('states');
    }
}
