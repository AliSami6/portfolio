<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function PolicyPage()
    {
        return view('Policy');
    }
}
