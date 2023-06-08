<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'sections_name', 
        'sections_version',
        'sections_content',
        'book_id',
        'total_sectionss',
    ];
}
