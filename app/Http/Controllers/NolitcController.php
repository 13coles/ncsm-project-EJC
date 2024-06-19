<?php

namespace App\Http\Controllers;

use App\Models\Programs;
use Illuminate\Http\Request;

class NolitcController extends Controller
{
    public function welcome(){
        return view("welcome");
    }
    public function tesda_qual(){
        $data_content = Programs::all();
        return view("tesda_qual", ["datas"=> $data_content]);
    }
    public function see_more($id){
        $data_content = Programs::find($id);
        return view("see_more", ["datas"=> $data_content]);
    }
    public function know_more(){
        return view("about");
    }
}
