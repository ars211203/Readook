<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class follows extends Model
{
    use HasFactory;
    protected $table = 'follows';

    protected $fillable = [
        'user_id',
        'book_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    /**
     * phương thức user: Nó xác định một mối quan hệ nhiều-một giữa model hiện tại và model User.
     * belongsto cho biết mỗi follow thuộc về 1 bản ghi trong bảng user
     * Mối quan hệ này được xác định bởi một khóa ngoại trên bảng của model hiện tại tham chiếu đến khóa chính củabảng User.
     */
}
