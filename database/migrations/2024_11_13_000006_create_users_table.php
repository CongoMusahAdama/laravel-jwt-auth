<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->char('id', 36)->primary();  // Use CHAR(36) instead of uuid()
            $table->char('country_id', 36)->nullable();  // Use CHAR(36) instead of uuid()
            $table->char('state_id', 36)->nullable();  
            $table->char('org_id', 36)->nullable();  // Use CHAR(36) instead of uuid()
            $table->string('name', 250)->nullable();
            $table->string('email', 250)->nullable()->unique();
            $table->string('phone', 250)->nullable();
            $table->dateTime('dob')->nullable();
            $table->enum('roles', ['admin', 'manager', 'user'])->nullable();
            $table->jsonb('preferences')->nullable();
            $table->string('image', 250)->nullable();
            $table->string('status', 50)->nullable();
            $table->string('password', 250)->nullable();
            $table->timestamps();

            // Foreign keys with matching data types
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('set null');
            $table->foreign('org_id')->references('id')->on('organizations')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
