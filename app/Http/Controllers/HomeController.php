<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        return view('home.index', [
            'name' => 'Zhafira Zila',
            'tanggal' => date('Y-m-d')
        ]
        );
    }
}
