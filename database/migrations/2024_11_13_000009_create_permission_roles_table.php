<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRolesTable extends Migration
{
    public function up()
    {
        Schema::create('permission_roles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('permission_id')->nullable();
            $table->uuid('role_id')->nullable();
            $table->timestamps();

            // Set up foreign key constraints
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('permission_roles');
    }
}
