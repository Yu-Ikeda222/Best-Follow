@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/facebook_js.css') }}">
@endsection


@section('content')
<nav>
    <ul>
      <li><a href="{{route('facebook.show')}}">FaceBook(laravel)</a></li>
      <li><a href="{{route('facebook.js')}}">FaceBook(JavaScript)</a></li>
    </ul>
</nav>

@if(empty($users_data))
 @include('layouts.form')
@else
@endif

@endsection