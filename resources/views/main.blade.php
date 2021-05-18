@extends('layouts/app')
@section('title')
    Главная
@endsection

@section('header')
    @include('components/header')
@endsection

@section('content')
    <div class="container">
        <div class="mt-3 mb-3">
            <h5>Группировать по:</h5>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="groupBy" id="group-none" onchange="get_tasks(this.id)" checked>
                <label class="form-check-label" for="group-none">без группировки</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="groupBy" id="group-date" onchange="get_tasks(this.id)">
                <label class="form-check-label" for="group-date">дате завершения</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="groupBy" id="group-responsible" onchange="get_tasks(this.id)">
                <label class="form-check-label" for="group-responsible">ответственным</label>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center flex-wrap" id="tasks_list">
    </div>
@endsection

@section('footer')
    @include('components/footer')
    @include('components/create-modal')
    @include('components/update-modal')
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
@endsection
