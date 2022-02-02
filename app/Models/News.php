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

    public function getNews($category){
        return DB::select("SELECT n.id, n.title, n.description, n.author, n.status, n.date FROM {$this->table} as n
        JOIN news_in_category as nc ON nc.news_id = n.id
        JOIN category as c ON c.id = nc.category_id
        WHERE c.slug='{$category}'");
    }

}
