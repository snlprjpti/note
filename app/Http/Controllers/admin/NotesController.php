<?php

namespace App\Http\Controllers\admin;

use App\Repository\NoteRepository;
use App\Http\Requests\NoteRequest;
use Illuminate\Http\Request;
use App\Note;
use App\Subject;
use App\Faculty;
use DB;
use Session;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Input;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 

    private $NoteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->NoteRepository = $noteRepository;
    }


    public function index()
    {   
        $faculties = Faculty::pluck('name','id');
        $subjects = Subject::pluck('name','id');
        $user = \Auth::user();
        $notes = Note::orderBy('id','DESC')->get();
        return view('admin.note.index', compact('faculties','notes','subjects','user'));
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
    public function store(NoteRequest $request)
    {
        $notes = $request->all(); 
        $files = $request->file;
        // $user = \Auth::user();
        // $request->use_id = $user->name;
        if(!empty($files))
        {
            foreach($files as $file):
                $extension = $file->getClientOriginalExtension();
                $fileName = time().rand(0,9000000).'.'.$extension;
                $file->move('back\files',$fileName);
                $notes['file'] = $fileName;
                $files = $this->NoteRepository->store($notes);
                Session::flash('success','File Saved Successfully');
            endforeach;
        }
        return redirect()->route('note.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note_edit = Note::find($id);
        // return $note_edit;  
        $faculties = Faculty::pluck('name','id');

        $subjects = Subject::pluck('name','id');

        $notes = Note::all();

        return view('admin.note.index', compact('note_edit','notes','faculties','subjects'));
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
    public function delete(Request $request)
    {
        $ids = $request->id;
            foreach($ids as $id):
                $id = Note::find($id);
                $id->delete();
                @unlink(public_path().'/back/files/'.$id->file);
             endforeach;
        return back();
    }   
}
