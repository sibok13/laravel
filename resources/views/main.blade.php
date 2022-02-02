@extends('layouts.news')
@section('title')
    Новостной портал @parent
@endsection

@section('page-header-h1')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Новостной портал ГИК!</h1>
      </div>
    </div>
  </section>
@endsection

@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        Здравствуй посетитель нашего новостного портала. Мы рады приветствовать тебя у нас и надеемся, что наши новости будут тебе полезны!
    </div>
@endsection
