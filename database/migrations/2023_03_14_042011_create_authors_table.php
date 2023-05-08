<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('bio')->nullable();
            $table->string('nickname')->nullable();
            $table->smallInteger('birth_year_in_hijri')->nullable();
            $table->boolean('birth_year_in_hijri_validated')->default(false);
            $table->smallInteger('death_year_in_hijri')->nullable();
            $table->boolean('death_year_in_hijri_validated')->default(false);
            $table->string('birth_place')->nullable();
            $table->decimal('birth_place_position_lat', 10, 6)->nullable();
            $table->decimal('birth_place_position_lng', 10, 6)->nullable();
            $table->string('death_place')->nullable();
            $table->decimal('death_place_position_lat', 10, 6)->nullable();
            $table->decimal('death_place_position_lng', 10, 6)->nullable();
            $table->integer('order')->default(0);
            $table->softDeletes();
            $table->timestamp('published_at');
            $table->timestamps();

            // $table->unique('slug');
            // $table->index('name', 'nickname');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
