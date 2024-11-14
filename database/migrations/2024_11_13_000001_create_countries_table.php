<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up()
    {
    Schema::create('countries', function (Blueprint $table) {
        $table->char('id', 36)->primary();  // Use CHAR(36) instead of uuid()
        $table->string('name');
        $table->string('flg_url')->nullable();
        $table->timestamps();
        $table->engine = 'InnoDB'; // Ensure InnoDB engine
    });
                
    }
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}

