<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Faculty;
use App\Subject;

class FrontController extends Controller
{
    public function index()
    {
    	$notes = Note::all();
    	$faculties = Faculty::all();
        $subjects = Subject::all();
    	return view('front.index', compact('notes','faculties','subjects'));
    }

    public function about()
    {
    	return view('front.about');
    }

    
}
