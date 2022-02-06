<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index() {
        //
    }
    
    public function showNewsCategory($category) {

        $news = Category::find(Category::where('slug', $category)->value('id'));
        $news = $news->news;

        return view('news/news', [
            'newsList' => $news
        ]);
    }

    public function showItem(News $news) {

        return view('news/item', [
            'news' => $news
        ]);
    }
}
