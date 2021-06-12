<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * ログイン画面を表示
     *
     * @return view
     */
    public function showList()
    {
        return view('auth.login');
    }
}
