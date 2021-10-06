<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index()
    {
        echo 'Hello World';
    }
    public function random($nama)
    {
        echo $nama;
    }
}
