@extends('layouts/app')
@section('title')
    Главная
@endsection

@section('header')
    @include('components/header')
@endsection

@section('content')
    <div class="d-flex justify-content-center flex-wrap" id="tasks_list">
    </div>
@endsection

@section('footer')
    @include('components/footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
@endsection
