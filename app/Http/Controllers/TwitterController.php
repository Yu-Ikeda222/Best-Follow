<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwitterController extends Controller
{
    public function showFriends(){
        //$friends = \Twitter::get('friends/list');
        //dd($friends);
        $people = "@Pythonist19";
        $search_user = \Twitter::get('friends/ids', ['screen_name'=> $people]);
        //dd($search_user);
        $cursor = $search_user->next_cursor;
        $next = \Twitter::get('friends/ids', ['screen_name'=> $people, 'cursor'=> "$cursor"]);
       dd($next);
        $token = 'AAAAAAAAAAAAAAAAAAAAAEtuJQEAAAAAJm6MdfCszsvdQrRMEjZUMhaNgWA%3DdyPIOIyeYD0qfHTCBMuO3awbe6Qyrb5mRMIm4Xpb1nMD3Ayjlp';
        
        $responses = \Http::withToken($token)->get('https://twitter.com/yu_maehe222');
        // dd($responses);
        // foreach($responses as $response){
        //     $datas = [];
        //     $datas = $response->data;
        //    // dd($datas);
        // }
        //dd($datas);
        return view('showFriends', ['responses' => $responses]);
    }

}
