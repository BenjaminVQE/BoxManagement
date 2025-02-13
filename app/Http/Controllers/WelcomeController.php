<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController
{
    function index()
    {
        return view("welcome");
    }
}
