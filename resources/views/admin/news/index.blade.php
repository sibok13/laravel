@extends('layouts.admin')

@section('title')
  Панель управления @parent
@endsection

@section('content')
@include('inc.message')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Панель управления</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <button type="button" class="btn btn-sm btn-outline-secondary"><a href="http://laravel.gb/admin/news/create">Добавить запись</a></button>
    </div>
    </div>
    <h2>Управление новостями</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <td>Id</td>
              <td>Title</td>
              <td>Slug</td>
              <td>Description</td>
              <td>Author</td>
              <td>Status</td>
              <td>Date</td>
              <td>Действия</td>
            </tr>
          </thead>
          @forelse ($newsList as $news)
          <tr>
            <td>{{ $news->id }}</td>
            <td>{{ $news->title }}</td>
            <td>{{ $news->slug }}</td>
            <td>{{ $news->description }}</td>
            <td>{{ $news->author }}</td>
            <td>{{ $news->status }}</td>
            <td>{{ $news->date }}</td>
            <td><a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.news.edit', [$news -> id]) }}">Редактировать</a> 
              <a class="btn btn-sm btn-outline-secondary" href="">Удалить</a>
            </td>
          </tr>
         @empty
         <p>Нет новостей</p>
         @endforelse
        </table>
@endsection