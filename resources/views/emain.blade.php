@extends('layouts/app')
@section('title')
    Главная
@endsection

@section('header')
    @include('components/header')
@endsection

@section('content')
    <div class="d-flex justify-content-center flex-wrap" id="tasks_list">
        <div class="card m-2 col-xl-3">
            <div class="card-body">
                <h5 class="card-title text-danger">Просроченная (title)</h5>
                <h6 class="card-subtitle text-muted">для Имя Фамилия</h6>
                <h6 class="card-subtitle text-muted">до 03.03.2020</h6>
                <h6 class="card-subtitle text-muted">Низкий приоритет</h6>
                <p class="card-text mt-2">Тут какое то длинное описание карточки. (description)</p>
                <span class="card-text float-end text-muted">Отменена</span>
            </div>
        </div>
        <div class="card m-2 col-xl-3">
            <div class="card-body">
                <h5 class="card-title text-muted">Действующая (title)</h5>
                <h6 class="card-subtitle text-muted">для Имя Фамилия</h6>
                <h6 class="card-subtitle text-muted">до 03.03.2020</h6>
                <h6 class="card-subtitle text-muted">Средний приоритет</h6>
                <p class="card-text mt-2">Тут какое то длинное описание карточки. (description)</p>
                <span class="card-text float-end text-muted">В работе</span>
            </div>
        </div>
        <div class="card m-2 col-xl-3">
            <div class="card-body">
                <h5 class="card-title text-success">Выполненная (title)</h5>
                <h6 class="card-subtitle text-muted">для Имя Фамилия</h6>
                <h6 class="card-subtitle text-muted">до 03.03.2020</h6>
                <h6 class="card-subtitle text-muted">Высокий приоритет</h6>
                <p class="card-text mt-2">Тут какое то длинное описание карточки. (description)</p>
                <span class="card-text float-end text-muted">Выполнена</span>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('components/footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
@endsection
