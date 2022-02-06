@extends('layouts.news')
@section('title')
    Новостной портал @parent
@endsection

@section('page-header-h1')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Аккаунт</h1>
      </div>
    </div>
  </section>
@endsection

@section('content')
    <div>
        Здравствуй {{ Auth::user()->name }} <br>
        <br>
        @if (Auth::user()->is_admin)
          Перейти в <a href="{{ route('admin.news.index') }}">Административную панель</a><br>
        @endif
        <a href="{{ route('account.logout') }}">Выйти</a> из аккаунта
    </div>
@endsection