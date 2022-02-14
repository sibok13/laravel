<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\category\CreateRequest;
use App\Http\Requests\category\UpdateRequest;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::all();

        return view('admin.category.index', [
            'newsList' => $categorys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->only('title', 'description') + [
            'slug' => Str::slug($request->input('title'))
        ];

        $created = Category::create($data);
        if($created){
            return redirect()->route('admin.category.index')
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
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->only('title', 'description') + [
            'slug' => Str::slug($request->input('title'))
        ];

        $updated = $category->fill($data)->save();
        if($updated){
            return redirect()->route('admin.category.index')
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
