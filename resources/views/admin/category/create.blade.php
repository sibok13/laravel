@extends('layouts.admin')

@section('title')
  Панель управления @parent
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Создание категории</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="http://laravel.gb/admin/news/create">Добавить запись</a></button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Отмена</button>
        </div>
    </div>
    </div>
    <form method="POST" action="{{ route('admin.category.store') }}">
      @csrf
      <div class="form-group">
        <label for="title">Заголовок категории</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="description">Краткое описание</label>
        <input type="text" class="form-control" id="description" name="description">
      </div>
      <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection