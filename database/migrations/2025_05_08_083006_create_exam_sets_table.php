<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_sets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('category_id')->constrained('class_categories')->onDelete('cascade');
            $table->string('subject');
            $table->foreignId('level_id')->constrained()->onDelete('cascade');
            $table->integer('total_marks')->default(0);
            $table->integer('duration')->comment('Duration in minutes');
            $table->enum('type', ['online', 'offline'])->default('online');
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_sets');
    }};
