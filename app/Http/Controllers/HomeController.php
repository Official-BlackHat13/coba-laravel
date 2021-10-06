<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
    	$teacher_id = Teacher::pluck('teacher_id');
        return view('home.index', [
        	'title' => 'Home',
        	'nama' => 'Aditya',
        	'data_siswa' => $teacher_id
        ]);
    }
}
