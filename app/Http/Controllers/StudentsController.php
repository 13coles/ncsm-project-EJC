<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Parents;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\PusherBroadcast;

class StudentsController extends Controller
{
    public function registerStudent(Request $request){

        $student = ['course'=>$request->course,'fname'=> strtolower($request->fname), 'lname'=>strtolower($request->lname), 'mname'=>strtolower($request->mname), 'sname'=>strtolower($request->sname), 'street_number'=>$request->student_numberStreet, 'city'=>$request->muni,'district'=>$request->dist,'zipcode'=>$request->zip, 'email'=> $request->student_email, 'gender'=>$request->gender, 'civil_status'=>$request->civil_status, 'employment'=>$request->employment, 'birthdate'=>$request->birthdate, 'nationality'=>$request->country, 'contact_number'=>$request->student_contactNumber, 'birthplace'=>$request->municapility, 'education'=>$request->education];
        Students::create($student);

        $lastest_id = DB::table('students')->latest('updated_at')->first();
        $parents = ['students_id'=>$lastest_id->id,'plname'=>$request->plname, 'pfname'=>$request->pfname, 'pmname'=>$request->pmname,'psname'=>$request->psname,'pcontact_number'=>$request->pcellphone_number, 'pstreet_number'=>$request->number_street, 'pmunicipality'=>$request->pmuni, 'pdistrict'=>$request->pdist, 'pzipcode'=>$request->Zip];
        Parents::create($parents);

        foreach($request->classification as $classification){
            $classification_data = ['students_id'=>$lastest_id->id, 'classification_data'=>$classification];
            Classification::create($classification_data);
        }
        event(new PusherBroadcast('Applicant name: '.$student['fname']));
        return redirect()->back()->with('success','Send Successs');

    }

    public function show($id)
    {
        $selectedStudent = Students::with(['parent', 'classification'])
                                   ->findOrFail($id);
    
        return response()->json(['student' => $selectedStudent]);
    }
    

  
}
