<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'category_id', 'price', 'quantity', 'image',
    ];

    // Define the inverse relationship to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
