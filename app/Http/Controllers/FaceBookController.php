<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Facebook\Facebook;

class FaceBookController extends Controller
{
    public function show() {
        $fb = new FaceBook;

          try {
            // Returns a `Facebook\Response` object
            $response = $fb->get('me?fields=friends', env('FACE_BOOK_ACCESS_TOKEN'));
          } catch(Facebook\Exception\ResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
          } catch(Facebook\Exception\SDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
          }
          
          $user = $response->getGraphUser();

          dd($user);
          
          echo 'Name: ' . $user['name'];
       // return view('show_facebook');
    }



    public function show_js() {
        return view('show_facebook_js');
    }
}
