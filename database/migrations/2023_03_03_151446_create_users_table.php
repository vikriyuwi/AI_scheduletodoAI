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
        Schema::create('user', function (Blueprint $table) {
            $table->integer('user_id',true);
            $table->string('user_name',256);
            $table->string('user_gmail',256);
            $table->string('user_google_id',256);
            $table->string('user_picture',256);
            $table->string('password',256);
            $table->string('user_pronounce',256)->nullable();
            $table->string('user_phone',256)->nullable();
            // new
            $table->integer('user_phone_verification')->default(1); 
            $table->string('user_token',256);
            // new
            $table->integer('user_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
