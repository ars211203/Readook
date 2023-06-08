<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }
    /**
     * đoạn mã  $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); để tạo khóa ngoại cho user_id trong cột follows
     * foreign để đn khóa ngoại cho cột user_id,references đn cột tham chiếu trong trường hợp này là tham chiếu tới users và kaasy id để gán cho user_id của follows
     * ondelete: xác định hành động thực đc hiện,kiểu 1 bản ghi trong user bị xóa thì tất cả bản ghi liên quan tới follow bị xóa
     * Tóm tắt: + nó được sử dụng thiết lập khóa ngoại cho cột user_id trong bảng follows liên kết cột id trong bảng user  
     *          + nếu 1 bản ghi user bị xóa thì tất cả bản ghi liên quan ở follows cũng bị xóa để bảo đảm tính nhất quán và toàn vẹn dữ liệu
     */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};
