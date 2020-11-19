<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class TwitterController extends Controller
{
    public function show()
    {
        return view('show_twitter');
    }

    public function store(Request $request)
    {
        //Ratelimitsの確認
        $limits = \Twitter::get('application/rate_limit_status');
        //dd($limits);

        //計測
        $startTime = microtime(true);
        $initialMemory = memory_get_usage();

        //各検索ボックスから送られてきた値を変数に
        $first = $request->first_box;
        $second = $request->second_box;
        $third = $request->third_box;
        
        //FirstBoxのフレンドを取得(5000ずつ単位でcursorが生成されるので、cursorが０でない限りループ)
        $first_friend_data = \Twitter::get('friends/ids', ['screen_name' => $first]);
        $first_friend_ids = $first_friend_data->ids;
        $first_cursor = $first_friend_data->next_cursor;
        while ($first_cursor !== 0) {
            $first_next_data = \Twitter::get('friends/ids', ['screen_name' => $first, 'cursor' => $first_cursor]);
            $first_next_ids = $first_next_data->ids;
            $first_friend_ids = array_merge($first_friend_ids, $first_next_ids);
            $first_cursor = $first_next_data->next_cursor;
        };
        //dd($first_friend_ids); //ここまでは完璧

        //SecondBoxのフレンド取得
        $second_friend_data = \Twitter::get('friends/ids', ['screen_name' => $second]);
        if(isset($second_friend_data->errors)){
            echo "ページを表示できません、打ち間違えていませんか？";
        }
        $second_friend_ids = $second_friend_data->ids;
        $second_cursor = $second_friend_data->next_cursor;
        while ($second_cursor !== 0) {
            $second_next_data = \Twitter::get('friends/ids', ['screen_name' => $second, 'cursor' => $second_cursor]);
            $second_next_ids = $second_next_data->ids;
            $second_friend_ids = array_merge($second_friend_ids . $second_next_ids);
            $second_cursor = $second_next_data->next_cursor;
        }

        //ThirdBoxのフレンド取得
        $third_friend_data = \Twitter::get('friends/ids', ['screen_name' => $third]);
        $third_friend_ids = $third_friend_data->ids;
        $third_cursor = $third_friend_data->next_cursor;
        while ($third_cursor !== 0) {
            $third_next_data = \Twitter::get('friends/ids', ['screen_name' => $third, 'cursor' => $third_cursor]);
            $third_next_ids = $third_next_data->ids;
            $third_friend_ids = array_merge($third_friend_ids, $third_next_ids);
            $third_cursor = $third_next_data->next_cursor;
        }

        //重複データの抽出
        $first_second_ids = array_intersect($first_friend_ids, $second_friend_ids);
        if(isset($third)){
            $friend_ids = array_intersect($first_second_ids, $third_friend_ids);
        }else{
            $friend_ids = $first_second_ids;
        }

        //bladeに渡す変数用意
        $users_data = [];
        foreach ($friend_ids as $id) {
            $show_id = $id;
            $user_data = \Twitter::get('users/show', ['user_id' => $show_id]);
            array_push($users_data, $user_data);
            //  dd($image);
        }

        $first_data = $user_data = \Twitter::get('users/show', ['screen_name' => $first]);
        $second_data = $user_data = \Twitter::get('users/show', ['screen_name' => $second]);
        $third_data = $user_data = \Twitter::get('users/show', ['screen_name' => $third]);

        //計測
        $runningTime = microtime(true) - $startTime;
        $usedMemory = (memory_get_peak_usage() - $initialMemory) / (1024 * 1024);
        dump('running time: ' . $runningTime . ' [s]'); // or var_dump()
        dump('used memory: ' . $usedMemory . ' [MB]'); // or var_dump()
        return view('show', [
            'users_data' => $users_data,
            'first_data' => $first_data,
            'second_data' => $second_data,
            'third_data' => $third_data,
        ]);
    }
}
