<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('login/tampilan/login', $data);
    }
}
