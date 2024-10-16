<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index(): string
    {
        return view('admin/page/main');
    }
}
