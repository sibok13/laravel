@extends('layouts.admin')

@section('title')
  Панель управления @parent
@endsection

@section('content')
@include('inc.message')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Панель управления</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <button type="button" class="btn btn-sm btn-outline-secondary"><a href="http://laravel.gb/admin/parse/create">Добавить запись</a></button>
    </div>
    </div>
    <h2>Управление заказами на парсинг</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <td>Id</td>
              <td>Title</td>
              <td>Link</td>
              <td>Description</td>
              <td>Действия</td>
            </tr>
          </thead>
          @forelse ($parseList as $parse)
          <tr>
            <td>{{ $parse->id }}</td>
            <td>{{ $parse->title }}</td>
            <td>{{ $parse->link }}</td>
            <td>{{ $parse->description }}</td>
            <td><a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.parse.edit', [$parse -> id]) }}">Редактировать</a> 
              <a class="btn btn-sm btn-outline-secondary" href="">Удалить</a>
            </td>
          </tr>
         @empty
         <p>Нет заявок</p>
         @endforelse
        </table>
@endsection