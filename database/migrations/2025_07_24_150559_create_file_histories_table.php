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
        Schema::create('file_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('file_id');
            $table->string('action'); // e.g., 'created', 'updated', 'deleted'
            $table->unsignedBigInteger('user_id'); // User who performed the action
            $table->string('type');
            $table->string('path')->nullable(); // Path of the file if applicable
            $table->string('qr_code')->nullable(); // QR code of the file if applicable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_histories');
    }
};
