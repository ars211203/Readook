<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_fullname');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('user_type')->default(0);
            $table->integer('user_version')->default(1);
             $table->string('user_image');
            $table->rememberToken();
            $table->timestamps();
        });
        User::create([
            'user_fullname' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'user_type' => 1,
            'user_version' => 1,
            'user_image' => 'defaul.jpg',
        ]);
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};