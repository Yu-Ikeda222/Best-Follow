<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FirstBox;
use App\SecondBox;
use App\ThirdBox;
use App\Friend;

class TwitterController extends Controller
{
  public function index(){
    return view('index');
  }

  public function store(Request $request){

//各検索ボックスから送られてきた値を変数に
    $first = $request->first_box;
    $second = $request->second_box;
    $third = $request->third_box;

 //FirstBoxのフレンドを取得(5000ずつ単位でcursorが生成されるので、cursorが０でない限りループ)
    $first_friend_data = \Twitter::get('friends/ids', ['screen_name'=> $first]);
    $first_friend_ids = $first_friend_data->ids;
    $first_cursor = $first_friend_data->next_cursor;
    while($first_cursor !== 0){
      $first_next_data = \Twitter::get('friends/ids', ['screen_name'=> $first, 'cursor'=> $first_cursor]);
      $first_next_ids = $first_next_data->ids;
      $first_friend_ids = array_merge($first_friend_ids, $first_next_ids);
      $first_cursor = $first_next_data->next_cursor;
    };
    //dd($first_friend_ids); //ここまでは完璧

 //SecondBoxのフレンド取得
    $second_friend_data = \Twitter::get('friends/ids', ['screen_name'=> $second]);
    $second_friend_ids = $second_friend_data->ids;
    $second_cursor = $second_friend_data->next_cursor;
    while($second_cursor !== 0){
      $second_next_data = \Twwiter::get('friends/ids', ['screen_name'=> $second, 'cursor'=> $second_cursor]);
      $second_next_ids = $second_next_data->ids;
      $second_friend_ids = array_merge($second_friend_ids. $second_next_ids);
      $second_cursor = $second_next_data->next_cursor;
    }

 //ThirdBoxのフレンド取得
    $third_friend_data = \Twitter::get('friends/ids', ['screen_name'=> $third]);
    $third_friend_ids = $third_friend_data->ids;
    $third_cursor = $third_friend_data->next_cursor;
    while($third_cursor !== 0){
      $third_next_data = \Twwiter::get('friends/ids', ['screen_name'=> $second, 'cursor'=> $third_cursor]);
      $third_next_ids = $second_next_data->ids;
      $third_friend_ids = array_merge($third_friend_ids, $third_next_ids);
      $third_cursor = $third_next_data->next_cursor;
    }

  //各データベースのデータを消去ののち、新しくデータを保存
    \DB::table('friends')->truncate();
    //First
    //\DB::table('first_boxes')->truncate();
    foreach($first_friend_ids as $first_friend_id){
      $first_data = new Friend;
      $first_data->friends_id = $first_friend_id;
      $first_data->save();
    }
    //Second
    //\DB::table('second_boxes')->truncate();
    foreach($second_friend_ids as $second_friend_id){
      $second_data = new Friend;
      $second_data->friends_id = $second_friend_id;
      $second_data->save();
    }
    
    //Third
   // \DB::table('third_boxes')->truncate();
    foreach($third_friend_ids as $third_friend_id){
      $third_data = new Friend;
      $third_data->friends_id = $third_friend_id;
      $third_data->save();
    }
    
    return redirect()->route('show', ['first' => $first, 'second' => $second, 'third' => $third]);

  }


  public function show(){

    $users = \DB::table('first_boxes')
    ->selectRaw('friends_id')
    ->groupBy('friends_id')
    ->having(\DB::raw('count(friends_id)'), '>', 2)
    ->get();
  // //テーブルを結合して比較 
  //   $users = \DB::table('first_boxes')
  //   //->leftjoin('second_boxes', 'first_boxes.friends_id', '=', 'second_boxes.friends_id')
  //   ->rightjoin('third_boxes', 'first_boxes.friends_id', '=', 'third_boxes.friends_id')
  //   ->select('first_boxes.*')
  //   // ->groupBy('friends_id')
  //  // ->having('friends_id', '>', 2)
  //   ->get();
     dd($users);
    return view('show');
  }
    public function showFriends(){
      
        //$friends = \Twitter::get('friends/list');
        //dd($friends);
      //   $people = "@Pythonist19";
      //   $search_user = \Twitter::get('friends/ids', ['screen_name'=> $people]);
      // dd($search_user);
      //   $cursor = $search_user->next_cursor;
      //  $next = \Twitter::get('friends/ids', ['screen_name'=> $people, 'cursor'=> "$cursor"]);
      //  //dd($next);
        
    //$token = 'AAAAAAAAAAAAAAAAAAAAAEtuJQEAAAAAJm6MdfCszsvdQrRMEjZUMhaNgWA%3DdyPIOIyeYD0qfHTCBMuO3awbe6Qyrb5mRMIm4Xpb1nMD3Ayjlp';
    $token = env('TWITTER_BEARER_TOKEN');  
    $responses = \Http::withToken($token)->get('https://api.twitter.com/2/users/137857547');
    //dd($responses);
        // foreach($responses as $response){
        //     $datas = [];
        //     $datas = $response->data;
        //    // dd($datas);
        // }
        //dd($datas);
        return view('showFriends', ['responses' => $responses]);
    }

}
