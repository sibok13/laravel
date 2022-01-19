@extends('layouts.news')

@section('title')
  Список категорий @parent
@endsection

@section('page-header-h1')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{ $news['title'] }}</h1>
            <p class="lead text-muted">Дата публикации: {{ $news['date'] }}</p>
        </div>
    </div>
</section>
@endsection
@section('content')
<div>{!! $news['description'] !!}</div>
@endsection
@section('content-footer')
<div><strong>Автор:</strong> {{ $news['author'] }}</div>
@endsection

</body>
</html>