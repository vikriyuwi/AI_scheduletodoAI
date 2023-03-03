<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todo', function (Blueprint $table) {
            $table->increments('todo_id');
            $table->string('todo_name',256);
            $table->integer('user_id');
            $table->foreign('user_id')->references('user_id')->on('user')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('todo_difficulty_level');
            $table->string('todo_link',512);
            $table->datetime('deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
