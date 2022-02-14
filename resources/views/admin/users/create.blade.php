@extends('layouts.admin')

@section('title')
  Панель управления @parent
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Создание пользователя</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
    </div>
    <form method="POST" action="{{ route('admin.users.store') }}">
      @csrf
      <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" id="name" name="name" required>
        @error('name')<div class="error">{{ $message }}</div>@enderror
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input class="form-control" id="email" name="email" required>
        @error('email')<div class="error">{{ $message }}</div>@enderror
      </div>
      <div class="form-group">
        <label for="password">Пароль</label>
        <input class="form-control" id="password" name="password" required>
        @error('password')<div class="error">{{ $message }}</div>@enderror
      </div>
      <div class="form-group">
        <label for="is_admin">Администратор</label>
        <select class="form-control" id="is_admin" name="is_admin">
          <option value=0 selected>Нет</option>
          <option value=1>Да</option>
      </select>
      <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection