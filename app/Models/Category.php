<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $fillable = [
        'title', 'description', 'slug'
    ];

    public function news(){
        return $this->belongsToMany(News::class, 'news_in_category', 'category_id', 'news_id');
    }

}
