<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Note;
use App\Faculty;
use App\Subject;


class CheckoutController extends Controller
{
    public function notes()
    {
    		$notes = Note::all();
	    	$faculties = Faculty::all();
	        $subjects = Subject::all();
		    $downloads = DB::table('notes')->get();
		    return view('front.notes', compact('downloads','notes','faculties','subjects'));	
    }

    public function faculty($id)
    {
	    	$subject = Subject::find($id);
	    	$faculty = Faculty::find($id);
	    	$subjects = Subject::all();
	    	$faculties = Faculty::all();
		    return view('front.faculty', compact('subject','faculties','faculty','subjects'));	
    }
    public function subject()
    {
    	$notes = Note::all();
	    	$faculties = Faculty::all();
	        $subjects = Subject::all();
		    $downloads = DB::table('notes')->get();
		    return view('front.subject', compact('downloads','notes','faculties','subjects'));
    }
   
}
