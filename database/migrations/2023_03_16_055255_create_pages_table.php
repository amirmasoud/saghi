<?php

use App\Models\Book;
use App\Models\Page;
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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('slug');
            $table->longText('strip_content')->nullable();
            $table->longText('plain_content')->nullable();
            $table->longText('html_content')->nullable();
            $table->integer('order')->default(0);
            $table->foreignIdFor(Book::class);
            $table->foreignIdFor(Page::class)->nullable();
            $table->softDeletes();
            $table->timestamp('published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
