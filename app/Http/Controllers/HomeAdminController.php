<?php

namespace App\Http\Controllers;

class HomeAdminController extends Controller
{
    public function index()
    {
        return view('admin.home.home')->with('title', 'Home');
    }
}
