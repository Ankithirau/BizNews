<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'short_desc',
        'category_id',
        'subcategory_id',
        'user_id',
        'image',
        'desc',
        'is_banner',
        'is_featured',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(subcategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
