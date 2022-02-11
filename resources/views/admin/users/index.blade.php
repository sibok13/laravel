@extends('layouts.admin')

@section('title')
  Панель управления @parent
@endsection

@section('content')
@include('inc.message')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Панель управления</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <button type="button" class="btn btn-sm btn-outline-secondary"><a href="http://laravel.gb/admin/users/create">Добавить пользователя</a></button>
    </div>
    </div>
    <h2>Управление пользователями</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <td>Id</td>
              <td>Имя</td>
              <td>email</td>
              <td>Дата регистрации</td>
              <td>Последний вход</td>
              <td>Статус</td>
              <td>Действия</td>
            </tr>
          </thead>
          @forelse ($usersList as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->last_login_at }}</td>
            <td>{{ $user->is_admin }}</td>
            <td><a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.users.edit', [$user -> id]) }}">Редактировать</a> 
              <a class="btn btn-sm btn-outline-secondary" href="">Удалить</a>
            </td>
          </tr>
         @empty
         <p>Нет пользователей</p>
         @endforelse
        </table>
@endsection