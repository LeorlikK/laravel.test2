@extends('admin.layout')
@section('menu')
    @include('admin.personal_menu')
@endsection
@section('table')
    <div class="row">
        <h1>{{ auth()->user()->email }}</h1>
    </div>
@endsection
