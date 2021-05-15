<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('header');
            $table->string('description');
            $table->dateTime('deadline');
            $table->timestamps();
            $table->foreignId('priority')->constrained('priorities');
            $table->foreignId('status')->constrained('statuses');
            $table->foreignId('creator')->constrained('users');
            $table->foreignId('responsible')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('priorities');
    }
}
