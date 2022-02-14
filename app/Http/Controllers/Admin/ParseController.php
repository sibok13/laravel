<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\resurce\CreateRequest;
use App\Http\Requests\resurce\UpdateRequest;
use App\Models\OrderParse;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ParseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parseList = OrderParse::all();

        return view('admin.resurce.index', [
            'parseList' => $parseList,
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
        return view('admin.resurce.create', [
            'catygoryList' => $categories,
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
        $data = $request->only('title', 'link', 'category', 'description');
        $created = OrderParse::create($data);
        if($created){
            return redirect()->route('admin.resurce.index')
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
    public function edit(OrderParse $resurce)
    {
        $categories = Category::all();
        $selectedCategories = DB::table('oreder_parse')
            ->where('id', $resurce->id)->first();

        return view('admin.resurce.edit', [
            'parse' => $resurce,
            'catygoryList' => $categories,
            'selectedCategories' => $selectedCategories->category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  OrderParse $resurce
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, OrderParse $resurce)
    {
        $data = $request->only('title', 'link', 'description', 'category');
        $updated = $resurce->fill($data)->save();
        if($updated){
            return redirect()->route('admin.resurce.index')
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
