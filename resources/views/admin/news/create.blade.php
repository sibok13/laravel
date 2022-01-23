@extends('layouts.admin')

@section('title')
  Панель управления @parent
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Создание новости</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="http://laravel.gb/admin/news/create">Добавить запись</a></button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Отмена</button>
        </div>
    </div>
    </div>
    <form method="POST" action="{{ route('admin.news.store') }}">
        @csrf
        <div class="form-group">
            <label for="category">Категория</label>
            <select class="form-control" id="category" name="category">
                <option value="politics">Политика</option>
                <option value="sport">Спорт</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control" id="author" name="author">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" id="status" name="status">
                <option value="draft">Черновик</option>
                <option value="public">Опубликовано</option>
                <option value="arhive">Снято с публикации</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
      </form>
@endsection