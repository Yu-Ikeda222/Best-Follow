@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/twitter_js.css') }}">
@endsection

@section('content')
<nav>
    <ul>
      <li><a href="{{route('twitter.show')}}">Twitter(laravel)</a></li>
      <li><a href="{{route('twitter.js')}}">Twitter(JavaScript)</a></li>
    </ul>
</nav>

<form method="post" action="{{route('twitter.store')}}">
@if(empty($users_data))
 @include('layouts.form')
@else
@endif
<script src="{{ mix('js/twitter.js') }}"></script>
@endsection