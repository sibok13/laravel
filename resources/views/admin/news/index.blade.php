@extends('layouts.admin')

@section('title')
  Панель управления @parent
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Панель управления</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="http://laravel.gb/admin/news/create">Добавить запись</a></button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Удалить</button>
        </div>
    </div>
    </div>
    <h2>Новости</h2>
        <p>Управление новостями</p>
@endsection