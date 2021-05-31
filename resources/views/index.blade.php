@extends('layout.layout')

@section('title', 'Home')

@section('content')
    <h3 class="p-0">{{ env('APP_NAME') }}</h3>
    <div>
        @include('includes.form')
        @include('includes.tasks')
    </div>
@endsection
