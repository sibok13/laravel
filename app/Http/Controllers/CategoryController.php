<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $category = $this->getCategory();

        return view('news/index', [
            'categoryList' => $category
        ]);
    }

    public function showCategory($category) {
        $category = $this->getCategory($category);

        return view('news/news', [
            'newsList' => $category
        ]);
    }
}
