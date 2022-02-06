@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтвердите ваш Email адрес') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Ссылка подтверждения вашего email была отправлена на вашу почту.') }}
                        </div>
                    @endif

                    {{ __('Перед продолжением воспользуйтесь ссылкой, отправленной вам на почту.') }}
                    {{ __('Если вы не получили email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите сюда для повторной отправки запроса') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
