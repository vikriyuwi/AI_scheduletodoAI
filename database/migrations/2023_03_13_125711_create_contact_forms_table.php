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
        Schema::create('contact_form', function (Blueprint $table) {
            $table->integer('cf_id',true);
            $table->string('cf_name',255);
            $table->string('cf_email',255);
            $table->string('cf_phone',255)->nullable();
            $table->string('cf_subject',255);
            $table->longText('cf_message');
            $table->integer('cf_case_closed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_forms');
    }
};
