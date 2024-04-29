<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ShowReportsController extends Controller
{
    public function index()
    {
        return view('site.index');
    }
}
