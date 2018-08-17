<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    //
    public function __construct()
    {
        header('Access-Control-Allow-Origin:*');//允许所有来源访问

        $this->middleware('auth')->except('login');
    }
}
