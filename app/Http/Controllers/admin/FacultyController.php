<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faculty;
use App\Http\Requests\FacultyRequest;
use App\Repository\FacultyRepository;
use Session;
use DB;

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
        $user = \Auth::user();
        return view('admin.faculty.index', compact('faculties','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output = "";
            $faculties = DB::table('faculties')->where('name','LIKE','%'.$request->search.'%')->get();
                                                // ->orWhere('fullname','LIKE','%'.$request->search.'%')->get();   
            if($faculties)
            {
                foreach($faculties as $faculty)
                {
                    $output.='<tr>'.
                                '<td>'.$faculty->id.'<td>'.
                                '<td>'.$faculty->name.'<td>'.
                                '<td>'.$faculty->fullname.'<td>'.
                             '</tr>';
                }
                return Response($output);
            }                                
        }
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
        // $faculties->user_id =  $request->user();
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
        // $semesters = Faculty::find($id)->semesters;
        // $user = \Auth::user()->pluck('name','id');
        // $faculties = Faculty::all();
        // return view('admin.faculty.index', compact('faculties','semesters','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculties= Faculty::all();
        $faculty_edit = Faculty::find($id);
        return view('admin.faculty.index', compact('faculty_edit','faculties'));
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
        $faculty = Faculty::find($id);
        $faculty->name = $request->name;
        $faculty->fullname = $request->fullname;
        $faculty->update();     
        Session::flash('success','Update Successfully');
        return redirect()->route('faculty.index');
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
            $faculty = $this->facultyRepository->delete($id);
            Session::flash('delete','delete Successfully');
            return back();

        } catch (\Exception $e) {
            Session::flash('error', 'Please Clear All related Notes and Subject before Deleting This faculty');
            return back();
        }
        
    }
}
