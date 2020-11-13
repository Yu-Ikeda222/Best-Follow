@extends('layouts.app')

@section('content')

{{--検索した元データ表示--}}
@if(isset($first_data->errors))
@else
<img src = "{{$first_data->profile_image_url}}">
 "@" {{$first_data->screen_name}}
<a href = "https://twitter.com/{{$first_data->screen_name}}">
<img src = "{{asset('img/Twitter_Logo_Blue.png')}}" style = "width: 50px; height: 50px;">
</a>
<br>
@endif

@if(isset($second_data->errors))
@else
<img src = "{{$second_data->profile_image_url}}">
"@"{{$second_data->screen_name}}
<a href = "https://twitter.com/{{$second_data->screen_name}}">
<img src = "{{asset('img/Twitter_Logo_Blue.png')}}" style = "width: 50px; height: 50px;">
</a>
<br>
@endif

@if(isset($third_data->errors))
@else
<img src = "{{$third_data->profile_image_url}}">
"@"{{$third_data->screen_name}}
<a href = "https://twitter.com/{{$third_data->screen_name}}">
<img src = "{{asset('img/Twitter_Logo_Blue.png')}}" style = "width: 50px; height: 50px;">
</a>
<br>

@endif

<h2>の検索結果は<?php $data_number = count($users_data);echo $data_number; ?>人です</h2>

{{--データの表示--}}
@foreach($users_data as $user_data)
<img src = "<?php echo $user_data->profile_image_url; ?>">
{{$user_data->name}}<br>
＠{{$user_data->screen_name}}<br>
ツイート数：{{$user_data->statuses_count}}<br>
フォロー数：{{$user_data->friends_count}}<br>
フォロワー数：{{$user_data->followers_count}}<br>
<a href = "https://twitter.com/{{$user_data->screen_name}}"><img src = "{{asset('img/Twitter_Logo_Blue.png')}}" style = "width: 50px; height: 50px;"></a>
<hr>
@endforeach

@endsection