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
        Schema::create('step', function (Blueprint $table) {
            $table->integer('step_id',true);
            $table->integer('todo_id');
            $table->foreign('todo_id')->references('todo_id')->on('todo')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('step_name',255);
            $table->string('step_detail',255)->nullable();
            $table->boolean('step_status')->default("TODO");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('steps');
    }
};
