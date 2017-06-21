<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Note;
use App\Faculty;
use Session;
use DB;
use App\Subject;
use App\Http\Requests\SubjectRequest;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $subjects = DB::table('subjects')->orderBy('id','Desc')->get();
        $subjects = Subject::orderBy('id','Desc')->get();
        $faculties = Faculty::pluck('name','id');
        $user = \Auth::user();
        // return $user;
        // dd($semesters);
        return view('admin.subject.index', compact('subjects','faculties','semesters','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
              
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        if($request->semester == '' && $request->year == '')
        {
            Session::flash('empty','Grade is blank');
            return back();    
        }
        else if($request->semester==null)
        {
            $request['grade']=$request->year;
        }
        else
        {
            $request['grade']=$request->semester;
        }
        Subject::create($request->all());
        Session::flash('success','Subject Saved Successfully'); 
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $notes = Subject::find($id)->notes;
        // $subjects = Subject::all();
        // $faculties = Faculty::all();

        // return view('admin.subject.index', compact('subjects','notes','faculties'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subjects = Subject::orderBy('id','Desc')->get();
        $faculties = Faculty::pluck('name','id');
        $subject_edit = Subject::find($id);
        return view('admin.subject.index', compact('subjects','subject_edit','faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $subject = Subject::find($id);
        $subject->name = $request->name;
        $subject->faculty_id = $request->faculty_id;
        $subject->grade = $request->grade;
        $subject->update();     
        Session::flash('success','Update Successfully');
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
            $subject = Subject::find($id);
            $subject->delete();
            Session::flash('delete','delete Successfully');
            return back();

        } catch (\Exception $e) {
            Session::flash('error', 'Please Clear All related Notes before Deleting This Subject');
            return back();
        }
    }
}
