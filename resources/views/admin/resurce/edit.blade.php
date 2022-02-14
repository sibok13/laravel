@extends('layouts.admin')

@section('title')
  Панель управления @parent
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактирование заявки на парсинг</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
    </div>
    <form method="POST" action="{{ route('admin.resurce.update', ['resurce' => $parse]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $parse->title }}" required>
            @error('title')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="link">Ссылка</label>
            <input type="text" class="form-control" id="link" name="link" value="{{ $parse->link }}" required>
            @error('link')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="link">Ссылка</label>
            <select multiple class="form-control" id="category" name="category">
                @foreach ($catygoryList as $category)
                <option value="{{ $category->id }}" 
                    @if($category->id == $selectedCategories) 
                        selected 
                    @endif
                    >{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $parse->description }}</textarea>
            @error('description')<div class="error">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </form>
@endsection