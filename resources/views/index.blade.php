@extends('layouts.app')
@section('content')
<form method="post" action="{{route('store')}}">
@csrf
<input name="first_box" placeholder="@"><br>
<input name="second_box" placeholder="@"><br>
<input name="third_box" placeholder="@"><br>
<input type="submit" value="検索" style="width:50px;height:40px;">
</form>
@endsection
