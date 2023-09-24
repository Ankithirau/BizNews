<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable=[
        'subcategory_name',
        'category_id',
        'subcategory_slug'
    ];

    public function category(){
       return $this->belongsTo(Category::class);
    }
}
