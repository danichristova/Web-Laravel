<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Nama tugas
            $table->text('description')->nullable(); // Deskripsi tugas
            $table->boolean('is_done')->default(false);
            $table->timestamp('completed_at')->nullable(); // Waktu selesai
            $table->timestamps(); // created_at & updated_at otomatis
        });
    }

};
