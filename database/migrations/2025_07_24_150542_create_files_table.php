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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path');
            $table->foreignId('user_id');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('type')->nullable();
            $table->bigInteger('size')->default(0); // Size in bytes
            $table->string('extension')->nullable();
            $table->string('qr_link')->nullable();
            $table->tinyInteger('status')->default(1); // pending, approved, rejected
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
