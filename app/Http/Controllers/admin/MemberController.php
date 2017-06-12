<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests\MemberRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;
use App\Repository\MemberRepository;


class MemberController extends Controller
{
    private $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function index()
    {
    	$members = $this->memberRepository->all();
    	return view('admin.member.index', compact('members'));
    }
    public function create()
    {
        return view('admin.member.create');
    }
    public function store(Request $request)
    {
        $members = $request->all();
        $members['password'] = bcrypt($request->password);
        $members = $this->memberRepository->store($members);
        Session::flash('success','saved Successfully');
       return redirect()->route('member.index');

    }

    public function status(Request $request)
    {
        $sts = $request->all();
        $id = $sts['id'];
        $status = $sts['status'];
        $member = User::find($id);
        $member->status = $status;
        $member->update();   
    }

    public function member_edit(Request $request,$id)
    {
        $member = User::find($id);
       $member->name = $request->name;
       $member->email = $request->email;
       $member->admin = $request->admin;
       $member->update();
       return redirect()->route('member.index');
    }
}
