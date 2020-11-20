<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramController extends Controller
{
    public function show() {
        return view('show_instagram');
    }

    public function show_js() {
        return view('show_instagram_js');
    }
}
