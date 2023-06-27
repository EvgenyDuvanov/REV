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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); 
            $table->timestamps();

            // $table->bigInteger('admin_id')->unsigned();//связь с таблице комментов
            // $table->foreign('admin_id')->references('id')->on('admins');

            $table->foreignId('user_id')->constrained('users');//сокращенно то, что выше

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
        Schema::dropIfExists('posts');
    }
};
