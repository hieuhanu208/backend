<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutController extends Controller
{
    public function getAbout(){
        return view('main.about');
    }
}
