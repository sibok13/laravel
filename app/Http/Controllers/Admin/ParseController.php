<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\parse\CreateRequest;
use App\Http\Requests\parse\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\OrderParse;

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

        return view('admin.parse.index', [
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
        return view('admin.parse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->only('title', 'link', 'description');

        $created = OrderParse::create($data);
        if($created){
            return redirect()->route('admin.parse.index')
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
    public function edit(OrderParse $parse)
    {
        return view('admin.parse.edit', [
            'parse' => $parse,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  OrderParse $parse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, OrderParse $parse)
    {
        $data = $request->only('title', 'link', 'description');

        $updated = $parse->fill($data)->save();
        if($updated){
            return redirect()->route('admin.parse.index')
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
