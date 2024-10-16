<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;

class Home_User_Controller extends BaseController
{
    public function index(): string
    {
        return view('user/page/home_user');
    }
}
