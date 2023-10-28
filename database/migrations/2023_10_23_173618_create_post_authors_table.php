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
        Schema::create('post_authors', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->boolean('byAdmin')->default(1)->nullable();
            $table->timestamps();
            
            $table->foreign('post_id')
            ->references('id')
            ->on('posts')
            ->cascadeOnUpdate()
            ->cascadeOnUpdate();

            $table->foreign('author_id')
            ->references('id')
            ->on('authors')
            ->cascadeOnUpdate()
            ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_authors');
    }
};
