<?php

namespace App\Models;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'category_name',
        'category_slug'
    ];

    public function subcategory(){
       return $this->hasMany(Subcategory::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
