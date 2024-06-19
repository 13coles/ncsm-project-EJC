<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthUser extends Controller
{
    public function index(){
        return view("login");
    }
    public function loginAction(Request $request){
        $data = $request->validate([
            "username"=> ["required"],
            "password"=> ["required"]
        ]);
        $user = User_info::where("username", $data["username"])->first();
        if(auth()->attempt($data)||Hash::check($data["password"], $user->password)){
            $request->session()->regenerate();
            if(auth()->user()->usertype == "staff"){
                return redirect()->route('staff')->with('success','welcome staff');
            }else if(auth()->user()->usertype == 'admin'){
                return redirect()->route('admin')->with('success','welcome admin');
            }else if(auth()->user()->usertype == 'officer'){
                return redirect()->route('officer')->with('success','welcome officer');
            }
        }else{
            return back()->with('invalid','Invalid Credentials!');
        }
    }
    
    // this can used to display data in tesda accredited
    //  to display the total number of students per course
    public function admin(){ 
        $total_numbers = Students::all();
        $total_numbers = DB::table('students')
        ->select('course', DB::raw('count(*) as total'))
        ->groupBy('course')
        ->get();
        $total_count = array();
        $courses = ["Visual Graphic Design NCIII", "Animation NC II", "Contact Center Services NC II", "2D Animation NC III"];

        foreach($courses as $course){
            foreach($total_numbers as $total_number){
                if($course==$total_number->course){
                    $total_count[$course] = $total_number->total;
                    break;
                }else{
                    $total_count[$course] = 0;
                }
            }
        }

        return view('pages.admin', ['total_count'=>$total_count])->with('success','Welcome Admin');
    }
    public function staff(){
        return view('pages.staff')->with('success','Welcome Staff');
    }
    public function officer(){
        return view('pages.officer')->with('success','Welcome Staff');
    }

    public function signoutAction(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login-user')->with('logout','Logout Success');
    }

}
