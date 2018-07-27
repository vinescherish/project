<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    //权限管理
    public  function __construct()
    {

        $this->middleware('auth:admin')->except('login');
    }
}