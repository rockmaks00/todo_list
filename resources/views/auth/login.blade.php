@extends('layouts/app')
@section('title')
    Войти
@endsection

@section('content')
    <main class="vertical-center">
        <div class="container">
            <div class="row justify-content-center">
                <form class="d-flex flex-column col-sm-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1 class="h3 fw-light align-self-center mb-3">Добро пожаловать</h1>
                    <div class="form-floating mb-1">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required>
                        <label for="email">E-Mail</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Пароль" required>
                        <label for="password">Пароль</label>
                    </div>
                    @foreach ($errors->all() as $error)
                        <span class="text-danger" role="alert">
                            <strong>{{ $error }}</strong>
                        </span>
                    @endforeach
                    <div class="checkbox mt-3 align-self-center">
                        <label>
                            <input type="checkbox" name="remember"> Запомнить
                        </label>
                    </div>
                    <button class="btn btn-lg btn-dark mt-3" type="submit">{{ __('Войти') }}</button>
                    <a href="{{ route('register') }}" class="mt-3 mb-5 text-dark align-self-center">Еще не зарегистрированы?</a>
                </form>
            </div>
        </div>
    </main>
@endsection
