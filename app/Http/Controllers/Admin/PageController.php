<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class PageController extends Controller
{
    public function getIndex() {
        return view('admin.main.main');
    }
}
