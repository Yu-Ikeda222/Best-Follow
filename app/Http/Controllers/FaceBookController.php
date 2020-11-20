<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaceBookController extends Controller
{
    public function show() {
        return view('show_facebook');
    }

    public function show_js() {
        return view('show_facebook_js');
    }
}
