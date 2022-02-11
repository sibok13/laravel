<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title', 'author', 'description', 'status', 'slug'
    ];

    public function categories(){
        return $this->belongsToMany(Category::class, 'news_in_category', 'news_id', 'category_id');
    }

}
