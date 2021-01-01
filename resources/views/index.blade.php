@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@endsection

@section('content')

    <ul >
      <li><a href="{{route('twitter.show')}}">Twitter</a></li>
          </ul>


@endsection


