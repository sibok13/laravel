@extends('layouts.news')
@section('title')
  Список новостей @parent
@endsection

@section('page-header-h1')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Список новостей категории</h1>
        <p class="lead text-muted">Описание категории.</p>
      </div>
    </div>
  </section>
@endsection

@section('content')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @forelse ($newsList as $news)
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
                <h2>{{ $news->title }}</h2>
                <div style="font-size: smaller;">Автор: {{ $news->author }}</div>
                <p>{!! $news->description !!}</p>
              <div class="d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-sm btn-outline-secondary"><a style="text-decoration: none;" href="{{ route('news.item', ['id' => $news->id]) }}">Читать далее...</a></button>
                <small class="text-muted">{{ $news->date }}</small>
              </div>
            </div>
          </div>
        </div>
    @empty
        <p>Нет новостей</p>
    @endforelse
      </div>
@endsection