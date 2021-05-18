@extends('layouts/app')
@section('title')
    Регистрация
@endsection

@section('content')
    <main class="vertical-center">
        <div class="container">
            <div class="row justify-content-center">
                <form class="d-flex flex-column col-sm-4" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1 class="h3 fw-light align-self-center mb-3">Добро пожаловать</h1>
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" id="surname" minlength="1" maxlength="20" placeholder="Иванов" required>
                        <label for="surname">Фамилия</label>
                    </div>
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" minlength="1" maxlength="20" placeholder="Иван" required>
                        <label for="name">Имя</label>
                    </div>
                    <div class="form-floating mb-1">
                        <input type="text" class="form-control @error('patronymic') is-invalid @enderror" name="patronymic" id="patronymic" minlength="1" maxlength="20" placeholder="Иванович" required>
                        <label for="patronymic">Отчество</label>
                    </div>
                    <div class="form-floating mb-1">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" minlength="5" maxlength="40" placeholder="name@example.com" required>
                        <label for="email">E-Mail</label>
                    </div>
                    <div class="form-floating mb-1">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" minlength="8" maxlength="40" placeholder="Пароль" required>
                        <label for="password">Пароль</label>
                    </div>
                    <div class="form-floating mb-1">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation" minlength="8" maxlength="40" placeholder="Повторите пароль" required>
                        <label for="password_confirmation">Повторите пароль</label>
                    </div>
                    <div class="form-group">
                        <label for="leader">Руководитель</label>
                        <select class="form-control" id="leader" name="leader">
                            <option value="">Нет</option>
                            @foreach($users as $user)
                                <option value="{{$user['id']}}">{{$user['name']}} {{$user['surname']}}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach ($errors->all() as $error)
                        <span class="text-danger" role="alert">
                            <strong>{{ $error }}</strong>
                        </span>
                    @endforeach
                    <button class="btn btn-lg btn-dark mt-3" type="submit">{{ __('Регистрация') }}</button>
                    <a href="{{ route('login') }}" class="mt-3 mb-5 text-dark align-self-center">Уже зарегистрированы?</a>
                </form>
            </div>
        </div>
    </main>
@endsection
