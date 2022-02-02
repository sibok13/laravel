<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\news\CreateRequest;
use App\Http\Requests\news\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use Symfony\Component\Console\Input\Input;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();

        return view('admin.news.index', [
            'newsList' => $news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.news.create', [
            'catygoryList' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->only('title', 'author', 'description', 'status') + [
            'slug' => Str::slug($request->input('title'))
        ];

        $created = News::create($data);
        if($created){
            foreach ($request->input('category') as $category) {
                DB::table('news_in_category')
                    -> insert([
                        'category_id' => intval($category),
                        'news_id' => $created->id
                    ]);
            }
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись добавлена');
        }
        return back()->with('error', 'Ошибка добавления')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        $selectedCategoriesTpl = DB::table('news_in_category')
        ->where('news_id', $news->id)
        ->get('category_id')->toArray();
        
        $selectedCategories = [];
        foreach ($selectedCategoriesTpl as $category) {
            $selectedCategories[]=$category->category_id;
        }

        return view('admin.news.edit', [
            'news' => $news,
            'catygoryList' => $categories,
            'selectedCategories' => $selectedCategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, News $news)
    {
        $data = $request->only('title', 'author', 'description', 'status') + [
            'slug' => Str::slug($request->input('title'))
        ];

        $updated = $news->fill($data)->save();
        if($updated){
            DB::table('news_in_category')
            ->where('news_id', $news->id)
            ->delete();

            foreach ($request->input('category') as $category) {
                DB::table('news_in_category')
                    -> insert([
                        'category_id' => intval($category),
                        'news_id' => $news->id
                    ]);
            }
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись обновлена');
        }
        return back()->with('error', 'Ошибка обновления')
        ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
