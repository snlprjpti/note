<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faculty;
use App\Http\Requests\FacultyRequest;
use App\Repository\FacultyRepository;
use Session;

class FacultyController extends Controller
{
   private $facultyRepository;

   public function __construct(FacultyRepository $facultyRepository)
   {
        $this->facultyRepository = $facultyRepository;
   }

    public function index()
    {
        $faculties= Faculty::all();
        $user = \Auth::user()->pluck('name','id');
        return view('admin.faculty.index', compact('faculties','user'));
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
    public function store(FacultyRequest $request)
    {
        $faculties = $request->all();
        $faculties = $this->facultyRepository->store($faculties);
        Session::flash('success','Faculty Saved Successfully'); 
        return redirect()->route('faculty.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $semesters = Faculty::find($id)->semesters;
        $user = \Auth::user()->pluck('name','id');
        $faculties = Faculty::all();
        return view('admin.faculty.index', compact('faculties','semesters','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
