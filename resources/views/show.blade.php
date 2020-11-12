@extends('layouts.app')

@section('content')

{{--検索した元データ表示--}}
<?php $data_number = count($users_data)?>
<img src = <?php echo $first_data->profile_image_url; ?>><?php echo $first_data->screen_name; ?><br>
<img src = <?php echo $second_data->profile_image_url; ?>><?php echo $second_data->screen_name; ?><br>
<img src = <?php echo $third_data->profile_image_url; ?>><?php echo $third_data->screen_name; ?><br>
<h2>の検索結果は<?php echo $data_number; ?>人です</h2>

{{--データの表示--}}
@foreach($users_data as $user_data)
<img src = <?php echo $user_data->profile_image_url; ?>>
{{$user_data->name}}<br>
＠{{$user_data->screen_name}}<br>
ツイート数：{{$user_data->statuses_count}}<br>
フォロー数：{{$user_data->friends_count}}<br>
フォロワー数：{{$user_data->followers_count}}<br>
<hr>
@endforeach

@endsection