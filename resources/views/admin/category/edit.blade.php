@extends('layouts.admin')

@section('title')
  Панель управления @parent
@endsection

@section('content')
@include('inc.message')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактирование категории</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
    </div>
    <form method="POST" action="{{ route('admin.category.update', ['category' => $category]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </form>
@endsection