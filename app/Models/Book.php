<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_name',
        'book_image',
        'book_author',
        'book_type',        
        'book_source',
        'book_status',
        'book_description',
        'book_view',
        'book_version',
    ];
    public function userReadHistory()
    {
        return $this->hasMany(UserReadHistory::class);
    }
    
    /**
     * func userReadHistory() là phương thức quan hệ 1-n giữa book và model userReadHistory
     * lớp quan hệ là: 1 book có thể có nhiều bản ghi userReadHistory 
     * được thể hiện qua khóa ngoại userReadHistory tham chiếu đến khóa chính book (model hiện tại)
     * => định nghĩa được mối quan hệ ta có thể truy vấn 
     */
}
