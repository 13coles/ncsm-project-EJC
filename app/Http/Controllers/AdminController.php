<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User_info;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use App\Mail\Sendemail;
use App\Models\Benefits;
use App\Models\Classification;
use App\Models\Competencies;
use App\Models\Contents;
use App\Models\Images;
use App\Models\Programs;
use App\Models\Qualifications;
use App\Models\ScoreCard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;





class AdminController extends Controller
{
    public function settings(){
        $id = auth()->user()->id;
        $adminData = User_info::find($id);
        return view("pages.adminSetting", ["dataAdmin"=> $adminData]);
    }

    // register student controller function
    // public function register_student(){
    //     $students = Students::where('status','=','TRUE')->orderBy('id', 'desc')->paginate(10);
    //     return view("pages.adminRegisterStudent", ['students'=>$students]);
    // }

    public function gotoApplicant(){
        $students = Students::where('status','=','FALSE')->orderBy('id', 'desc')->paginate(10);
        return view('pages.adminapplicant', ['students'=>$students]);
    }

    public function index(Request $request)
    {
        // Define status options
        $statusOptions = ['pending', 'approved'];

        // Retrieve students data
        $students = DB::table('students')->get();

        // Retrieve students data with relationships loaded
        $studentsQuery = Students::query()->with('parents', 'classification');
      
        $students = Students::paginate(5);

        // Check if course filter is applied
        if ($request->filled('course')) {
            $courseName = $request->input('course');
            $studentsQuery->where('course', $courseName);
        }

        // Check if status filter is applied
        if ($request->filled('status')) {
            $status = $request->input('status');
            $studentsQuery->where('status', $status);
        }

        // Fetch unique course names for the dropdown filter
         $uniqueCourses = Students::select('course')->distinct()->pluck('course');
         
        return view('pages.adminRegisterStudent', [
            'students' => $students,
            'statusOptions' => $statusOptions,
            'uniqueCourses' => $uniqueCourses,
            'request' => $request, // Ensure $request is passed to the view
        ]);
    }
  
    

    public function search_applicant(Request $request){
        $request->validate([
            'search'=> ['required'],
        ]);
        $students = Students::where("status","=","FALSE")->where('fname','LIKE','%'.strtolower($request->search).'%')->orWhere('lname','LIKE','%'.strtolower($request->search).'%')->orWhere('mname','LIKE','%'.strtolower($request->search).'%')->paginate(10);
        return view("pages.adminapplicant", ['students'=>$students]);
    }

    public function filter_applicant($course){
        dd($course);
    }
    public function search_register(Request $request){
        $request->validate([
            'search'=> ['required'],
        ]);
        $students = Students::where("status","approved")->where('fname','LIKE','%'.strtolower($request->search).'%')->orWhere('lname','LIKE','%'.strtolower($request->search).'%')->orWhere('mname','LIKE','%'.strtolower($request->search).'%')->paginate(10);
        return view("pages.adminapplicant", ['students'=>$students]);
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
        $adminData->decrypt = $data['password'];
        $adminData->password = bcrypt($data['password']);

        $adminData->save();
        return redirect()->back()->with('success','Update success');
    }

    public function student_profile($id){
        $student = Students::find($id);
        $student['birthdate'] = date("M-d-Y", strtotime($student['birthdate']));
        return view('pages.adminuser_profile', ['student'=>$student]);
    }
    public function deleteApplicant(Request $request){
        $data = array(
            'message'=> '
            Thank you for your interest in the Negros Occidental Language and Information Technology Center (NOLITC). We appreciate the time you took to complete the registration form.'."
            \n".
            'After careful consideration, we regret to inform you that we are unable to offer you a place in the course at this time. The selection process was highly competitive, and we received many strong registrations.'."
            \n".
            'We encourage you to apply again in the future and wish you the best in your educational and professional endeavors. If you have any questions, please feel free to contact us at:'."
            \n",
            'telephone' => "(034) 435 6092",
            'email'=> "nolitc@gmail.com"
        );
        $student = Students::find($request->student_id);
        Mail::to($student->email)->send(new Sendemail($data));
        $student->delete();
        return redirect()->route('applicant_admin');
    }

    public function acceptApplicant(Request $request){
        $data = array(
            'message'=> '
            We are pleased to inform you that you have been accepted at Negros Occidental Language and Information Technology Center (NOLITC). We are excited to welcome you to our community.'."
            \n".
            'We look forward to your participation in the course and are confident that you will find it both challenging and rewarding.'."
            \n".
            'If you have any questions or need further information, do not hesitate to contact us at:'."
            \n",
            'telephone' => "(034) 435 6092",
            'email'=> "nolitc@gmail.com"
        );
        $user_id = $request->student_id;
        $student = Students::find($user_id);
        Mail::to($student->email)->send(new Sendemail($data));
        $student['status'] = 'pending';
        $student->save();
        return redirect()->route('applicant_admin');
    }


    public function downloadPdf($id){
        $student = Students::find($id);
        $student['birthdate'] = date("M-d-Y", strtotime($student['birthdate']));
        $data = [
            'title' => 'student profile',
            'student' =>  $student
        ];

        $pdf = Pdf::loadView('pdf.downloadPdf', ['data'=>$data])->setPaper('a4', 'portrait');
        return $pdf->download($student->fname." ".$student->lname.".pdf");
    }

    public function upload_welcome(){
        $content = Contents::find(1);

        if($content!=null){
            return view("pages.adminwelcome", ['image'=>$content->images['0']]);
        }else{
            return view("pages.adminwelcome", ['image'=>'default.jpg']);
        }
    }

    public function upload_cover(Request $request){
        $filename = '';

        if($request->hasFile("image_upload")){
            $request->validate([
                'image_upload'=>'mimes:jpeg,png,bmp,tiff |max:4094',
            ]);
            $database = time().'.'.$request->image_upload->extension() ;
            $filename = $request->getSchemeAndHttpHost(). '/assets/img/'.$database;
            $request->image_upload->move(public_path('/assets/img/'), $filename);
            $content = Images::where('contents_id','=','1')->first();
            $content['image'] = $database;
            $content->save();
            // $content_img = Contents::find(1);
            return redirect()->back()->with('success','Update cover photo success');
            // return view("pages.adminwelcome", ['image'=>$content_img->images['0']])->with('success', 'Update cover photo success');
        }
    }

    public function program_management(){
        return view('pages.adminprogrammanagemant');
    }

    public function program_management_form(){
        $programs = Programs::orderBy('id', 'DESC')->get();
        return view('pages.adminprogramsform', ['programs'=>$programs]);
    }

  
    public function tesdaAccredited()
    {
        // Fetching only specific columns from the programs table
        $programs = DB::table('programs')
                        ->select('id','name', 'hours', 'assessment_fee')
                        ->get();

        // Normalize the program names
        $programs = $programs->map(function ($program) {
            $program->name = strtoupper(trim($program->name));
            return $program;
        });

        // Fetching the student counts per course and normalizing keys
        $studentCounts = DB::table('students')
                        ->select('course', DB::raw('count(*) as student_count'))
                        ->groupBy('course')
                        ->get()
                        ->pluck('student_count', 'course')
                        ->mapWithKeys(function ($item, $key) {
                            return [strtoupper(trim($key)) => $item];
                        });

        // Mapping array for discrepancies
        $nameMapping = [
            'VISUAL GRAPHIC DESIGN NCIIII' => 'VISUAL GRAPHIC DESIGN NCIII'
        ];

        // Applying the mapping to the programs
        $programs = $programs->map(function ($program) use ($nameMapping) {
            if (isset($nameMapping[$program->name])) {
                $program->name = $nameMapping[$program->name];
            }
            return $program;
        });
        // Debugging: Check the structure of $programs and $studentCounts
        // dd($programs, $studentCounts);

        // Returning the view with the data
        return view('pages.admintesdaAccredited', [
            'programs' => $programs,
            'studentCounts' => $studentCounts
        ]);
    }

   
    public function updateTesdaAccredited(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'assessment_fee' => 'required|numeric',
            'hours' => 'required|integer', // Add validation rule for hours
        ]);
    
        try {
            // Retrieve the Program model instance
            $program = Programs::findOrFail($id);
    
            // Update the model instance with the validated data
            $program->name = $request->input('name');
            $program->assessment_fee = $request->input('assessment_fee');
            $program->hours = $request->input('hours'); // Assign hours
    
            // Save the changes
            $program->save();
    
            return redirect()->back()->with('success', 'Program updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Program: ' . $e->getMessage());
        }
    }
    
    
    public function programs_addform(){
        return view('pages.adminprogramsinsertform');
    }

    public function addTesdaQualification(Request $request){
        $data = $request->validate([
            'course_name'=> 'required',
            'hours'=> 'required|numeric',
            'course_caption'=> 'required',
            'qualification'=> 'required|array',
            'benefits'=> 'required|array',
            'competencies'=> 'required|array',
            'image'=>'mimes:jpeg,png,bmp,tiff |max:4094',
        ]);
        $database = time().'.'.$data['image']->extension() ;
        $filename = $request->getSchemeAndHttpHost(). '/assets/img/'.$database;
        $data['image']->move(public_path('/assets/img/'), $filename);

       Programs::create([
        'name'=> $data['course_name'],
        'hours'=> $data['hours'],
        'caption'=> $data['course_caption'],
        'img_name' => $database,
       ]);

       $lastest_id = DB::table('programs')->latest('updated_at')->first();

       foreach($data['qualification'] as $qualification){
            Qualifications::create([
                'programs_id'=>$lastest_id->id,
                'qualification'=>$qualification
            ]);
       }

       foreach($data['benefits'] as $benefit){
            Benefits::create([
                'programs_id'=>$lastest_id->id,
                'benefit'=>$benefit
            ]);
       }

       foreach($data['competencies'] as $competencies){
            Competencies::create([
                'programs_id'=>$lastest_id->id,
                'competencie'=>$competencies
            ]);
       }

       //return $this->programs_addform();
       return redirect('program-management/form')->with('success','Add Success');

    }

    public function program_qualification($id){
        $program = Programs::find($id);
        return view('pages.adminprogramsContent', ['program'=>$program]);
    }

    public function update_program($id){
        $program = Programs::find($id);
        return view('pages.adminprogramsupdateform', ['program'=>$program]);
    }

    public function updateContent_program(Request $request, $id){
        $data = $request->validate([
            'course_name'=> 'required',
            'hours'=> 'required|numeric',
            'course_caption'=> 'required',
            'qualification'=> 'required|array',
            'benefits'=> 'required|array',
            'competencies'=> 'required|array',
            'image'=>'mimes:jpeg,png,bmp,tiff |max:4094',
        ]);

        $program = Programs::find($id);

        $program->name = $data['course_name'];
        $program->hours = $data['hours'];
        $program->caption = $data['course_caption'];
        if($request->image!==null){
            if($data['image']!==null){
                $database = time().'.'.$data['image']->extension() ;
                $filename = $request->getSchemeAndHttpHost(). '/assets/img/'.$database;
                $data['image']->move(public_path('/assets/img/'), $filename);
                $program->img_name = $database;
            }
        }
        $program->save();

        Qualifications::where('programs_id','=',$id)->delete();
        Competencies::where('programs_id','=',$id)->delete();
        Benefits::where('programs_id','=',$id)->delete();

        foreach ($data['qualification'] as $qualification){
            Qualifications::create([
                'programs_id'=>$id,
                'qualification'=>$qualification
            ]);
        }

        foreach ($data['competencies'] as $competencies){
            Competencies::create([
                'programs_id'=>$id,
                'competencie'=>$competencies
            ]);
        }

        foreach ($data['benefits'] as $benefits){
            Benefits::create([
                'programs_id'=>$id,
                'benefit'=>$benefits
            ]);
        }

        return redirect()->back()->with('success','Update success');

    }


    public function delete_program(Request $request){
       Programs::where('id','=',$request->delete_id)->delete();
       return redirect('program-management/form')->with('success','Add Success');
    }

    public function showScoreCard()
    {

        $scoreCard = ScoreCard::all(); // Fetch all score cards
        return view('pages.score_card', ['scoreCard' => $scoreCard]); // Pass the score cards to the view
    }



}

