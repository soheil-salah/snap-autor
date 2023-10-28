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
            $table->engine = 'InnoDB';

            $table->id();
            $table->unsignedBigInteger('post_category_id');
            $table->string('title');
            $table->string('short_description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->longText('content');
            $table->string('image')->nullable();
            $table->boolean('isPublished')->default(0)->nullable();
            $table->string('slug');
            $table->dateTime('posted_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('post_category_id')
            ->references('id')
            ->on('post_categories')
            ->cascadeOnUpdate()
            ->cascadeOnUpdate();
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
