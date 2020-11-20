@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/instagram.css') }}">
@endsection


@section('content')
<nav>
    <ul>
      <li><a href="{{route('instagram.show')}}">Instagram(laravel)</a></li>
      <li><a href="{{route('instagram.js')}}">Instagram(JavaScript)</a></li>
    </ul>
</nav>

@if(empty($users_data))
 @include('layouts.form')
@else
@endif

@endsection