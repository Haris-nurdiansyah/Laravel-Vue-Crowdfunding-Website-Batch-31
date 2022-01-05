<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function route_1()
    {
        return "this is route 1";
    }

    public function route_2()
    {
        return "this is route 2";
    }
}
