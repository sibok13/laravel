@extends('layouts.admin')

@section('title')
  Панель управления @parent
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактирование новости</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
    </div>
    <form method="POST" action="{{ route('admin.news.update', ['news' => $news]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="category">Категория</label>
            <select multiple class="form-control" id="category" name="category[]">
                @foreach ($catygoryList as $category)
                <option value="{{ $category->id }}" 
                    @if(in_array($category->id, $selectedCategories)) 
                        selected 
                    @endif
                    >{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" required>
            @error('title')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control" id="author" value="{{ $news->author }}" name="author">
            @error('author')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $news->description }}</textarea>
            @error('description')<div class="error">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" id="status" name="status">
                <option value="DRAFT" @if($news->status === 'DRAFT') selected @endif>Черновик</option>
                <option value="PUBLISHED" @if($news->status === 'PUBLISHED') selected @endif>Опубликовано</option>
                <option value="ARCHIVE" @if($news->status === 'ARCHIVE') selected @endif>Снято с публикации</option>
            </select>
            @error('status')<div class="error">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </form>
@endsection