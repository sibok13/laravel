<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\user\UpdateRequest;
use App\Http\Requests\user\CreateRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', [
            'usersList' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->only('name', 'email', 'is_admin') + [
            'password' => Hash::make($request->input('password'))];

        $created = User::create($data);
        if($created){
            return redirect()->route('admin.users.index')
                ->with('success', 'Пользователь создан');
        }
        return back()->with('error', 'Ошибка создания')
        ->withInput();//
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
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->only('name', 'email', 'is_admin');

        if(!is_null($request->input('password'))){
            $data += ['password' => Hash::make($request->input('password'))];
        }

        $updated = $user->fill($data)->save();
        if($updated){
            return redirect()->route('admin.users.index')
                ->with('success', 'Пользователь обновлен');
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
