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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_name');
            $table->string('book_image');
            $table->string('book_author')->default('Ẩn danh');
            $table->string('book_type')->default("thể loại chung");
            $table->string('book_source')->default('Internet');
            $table->integer('book_status')->default(0);
            $table->string('book_description');
            $table->integer('book_version')->default(1);
            $table->integer('book_view')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
