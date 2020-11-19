@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/twitter.css') }}">
@endsection
@section('content')
<nav>
    <ul>
      <li><a href="{{route('twitter.show')}}">Twitter(laravel)</a></li>
      <li><a href="">Twitter(JavaScript)</a></li>
    </ul>
</nav>

@include('layouts.form')
@endsection
