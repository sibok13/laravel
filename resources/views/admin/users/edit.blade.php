@extends('layouts.admin')

@section('title')
  Панель управления @parent
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактирование пользователя</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
    </div>
    <form method="POST" action="{{ route('admin.users.update', ['user' => $user]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Заголовок</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            @error('name')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            @error('email')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input class="form-control" id="password" name="password">
            @error('password')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
          <label for="is_admin">Администратор</label>
          <select class="form-control" id="is_admin" name="is_admin">
            <option value=1 @if($user->is_admin === 1) selected @endif>Да</option>
            <option value=0 @if($user->is_admin == null) selected @endif>Нет</option>
        </select>
          @error('email')<div class="error">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </form>
@endsection