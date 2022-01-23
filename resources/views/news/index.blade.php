@extends('layouts.news')
@section('title')
  Список категорий @parent
@endsection

@section('page-header-h1')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Список категории</h1>
      </div>
    </div>
  </section>
@endsection

@section('content')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @forelse ($categoryList as $item)
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
                <a class="a-heder" href="{{ route('category.news', ['category' => $item['category']]) }}"><h2 style="margin: 5px 0;">{{ $item['title'] }}</h2></a>
                <p>{{ $item['description'] }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-sm btn-outline-secondary"><a style="text-decoration: none;" href="{{ route('category.news', ['category' => $item['category']]) }}">Читать</a></button>
              </div>
            </div>
          </div>
        </div>
    @empty
        <p>Нет новостей</p>
    @endforelse
      </div>
@endsection
