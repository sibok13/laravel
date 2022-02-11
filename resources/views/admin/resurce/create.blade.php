@extends('layouts.admin')

@section('title')
  Панель управления @parent
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Создание категории</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
    </div>
    <form method="POST" action="{{ route('admin.resurce.store') }}">
      @csrf
      <div class="form-group">
        <label for="title">Заголовок категории</label>
        <input type="text" class="form-control" id="title" name="title" required>
        @error('title')<div class="error">{{ $message }}</div>@enderror
      </div>
      <div class="form-group">
        <label for="link">Ссылка</label>
        <input type="text" class="form-control" id="link" name="link" required>
        @error('link')<div class="error">{{ $message }}</div>@enderror
      </div>
      <div class="form-group">
        <label for="description">Описание</label>
        <input type="text" class="form-control" id="description" name="description">
        @error('description')<div class="error">{{ $message }}</div>@enderror
      </div>
      <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection