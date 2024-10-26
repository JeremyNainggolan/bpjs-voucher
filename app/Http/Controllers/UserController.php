<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('user.index');
    }

    public function login()
    {
        $data['page_title'] = 'Login';
        return view('login', compact('data'));
    }
}
