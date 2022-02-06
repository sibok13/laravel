@extends('layouts.news')
@section('title')
    Новостной портал @parent
@endsection

@section('page-header-h1')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Контакты</h1>
      </div>
    </div>
  </section>
@endsection

@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 center">
        
        <form method="POST" action="{{ route('contact.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Ваше имя</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="mail">e-mail</label>
                <input  type="email" class="form-control" id="mail" name="mail" required>
            </div>
            <div class="form-group">
                <label for="title">Тема обращения</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="description">Сообщение</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
          </form>

    </div>
@endsection