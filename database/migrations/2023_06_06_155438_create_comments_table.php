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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('post_id')->constrained('posts');

            $table->string('title');
            $table->text('content');

            $table->boolean('published')->default(true);// статус оубликован/не опубликован!
            $table->timestamp('published_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
