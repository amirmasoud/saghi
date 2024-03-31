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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('slug')->nullable();
            $table->text('nickname')->nullable();
            $table->text('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->integer('birth_year_in_hijri')->nullable();
            $table->boolean('birth_year_validated_at')->nullable();
            $table->text('birth_place')->nullable();
            $table->string('birth_place_location')->nullable();
            $table->integer('death_year_in_hijri')->nullable();
            $table->integer('death_year_validated_at')->nullable();
            $table->text('death_place')->nullable();
            $table->string('death_place_location')->nullable();
            $table->string('order_column')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
