@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/facebook.css') }}">
@endsection


@section('content')
<nav>
    <ul>
      <li><a href="{{route('facebook.show')}}">FaceBook(laravel)</a></li>
      <li><a href="{{route('facebook.js')}}">FaceBook(JavaScript)</a></li>
    </ul>
</nav>

<form method="post" action="{{route('facebook.store')}}">
@if(empty($users_data))
 @include('layouts.form')
@else
@endif

@endsection