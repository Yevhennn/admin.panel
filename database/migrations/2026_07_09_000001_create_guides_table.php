<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('category')->nullable(); // war|biz|prop|family
            $table->string('tag')->nullable(); // hot|new|biz|family|...
            $table->string('title_uk');
            $table->string('title_en')->nullable();
            $table->text('desc_uk')->nullable();
            $table->text('desc_en')->nullable();
            $table->text('advantages_uk')->nullable();
            $table->text('advantages_en')->nullable();
            $table->text('features')->nullable(); // json/text list
            $table->unsignedInteger('price_old')->nullable();
            $table->unsignedInteger('price');
            $table->unsignedSmallInteger('pages')->nullable();
            $table->unsignedSmallInteger('chapters')->nullable();
            $table->unsignedSmallInteger('templates')->nullable();
            $table->string('status')->default('published'); // draft|published|hidden
            $table->unsignedInteger('sort')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};
