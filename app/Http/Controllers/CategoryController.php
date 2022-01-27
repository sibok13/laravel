<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {

        $categorys = new Category();

        return view('news/index', [
                'categoryList' => $categorys->getCategorys()
            ]);
    }
}
