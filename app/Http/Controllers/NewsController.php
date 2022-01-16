<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = $this->getNews();

        return view('news/news', [
            'newsList' => $news
        ]);
    }

    public function showItem($id) {
        $news = $this->getNews($id);

        return view('news/item', [
            'news' => $news
        ]);
    }
}
