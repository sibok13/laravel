<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        //
    }
    
    public function showNewsCategory($category) {

        $news = new News();

        return view('news/news', [
            'newsList' => $news->getNews($category)
        ]);
    }

    public function showItem(News $news) {

        return view('news/item', [
            'news' => $news
        ]);
    }
}
