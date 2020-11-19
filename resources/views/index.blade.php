@extends('layouts.app')
@section('content')
<nav>
    <ul>
      <li><a href="">Twitter(laravel)</a></li>
      <li><a href="">Twitter(JavaScript)</a></li>
      <li><a href="">FaceBook(laravel)</a></li>
      <li><a href="">FaceBook(JavaScript)</a></li>
    </ul>
</nav>
<form method="post" action="{{route('store')}}">
  @csrf
  <div class="input">
    <input name="first_box" placeholder="@"><br>
    <input name="second_box" placeholder="@"><br>
    <input name="third_box" placeholder="@"><br>
    <input type="submit" value="検索" class ="btn">
  </div>
</form>
@endsection
