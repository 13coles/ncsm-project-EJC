<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User_info;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function settings(){
        $id = auth()->user()->id;
        $adminData = User_info::find($id);
        return view("pages.adminSetting", ["dataAdmin"=> $adminData]);
    }

    public function register_student(){

        $students = Students::orderBy('id', 'desc')->paginate(10);

        return view("pages.adminRegisterStudent", ['students'=>$students]);

    }

    public function search(Request $request){
        $request->validate([
            'search'=> ['required'],
        ]);
        $students = Students::where('fname','LIKE','%'.strtolower($request->search).'%')->orWhere('lname','LIKE','%'.strtolower($request->search).'%')->orWhere('mname','LIKE','%'.strtolower($request->search).'%')->paginate(10);
        return view("pages.adminRegisterStudent", ['students'=>$students]);
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            "fname"=> ['required'],
            "lname"=> ['required'],
            "email"=> ['required', 'email', Rule::unique('users')->ignore($id)],
            "username"=> ["required"],
            "password"=> 'required|confirmed',
        ]);
        $adminData = User_info::find($id);
        $adminData->fname = $data['fname'];
        $adminData->lname = $data['lname'];
        $adminData->email = $data['email'];
        $adminData->username = $data['username'];
        $adminData->password = bcrypt($data['password']);
        $adminData->save();
        return redirect()->back()->with('success','Update success');
    }

    public function student_profile($id){
        $student = Students::find($id);
        return view('pages.user_profile', ['student'=>$student]);
    }


}
