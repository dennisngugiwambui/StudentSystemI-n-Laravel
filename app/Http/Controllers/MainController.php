<?php

namespace App\Http\Controllers;

use App\Models\Activities as ModelsActivities;
use App\Models\Leadership;
use Illuminate\Http\Request;
use Toastr;
use Illuminate\Support\Facades\Auth;
use App\Models\LoginLog;
use App\Models\Skill;
use App\Models\StudentRegister;
use App\Models\Punshment as Punshment;
use Brian2694\Toastr\Toastr as ToastrToastr;
use Illuminate\Support\Str;


class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function Admin_activities(Request $request)
    {
        $data= new ModelsActivities();

        $data->activity_name=$request->name;
        $data->date=$request->date;
        $data->term=$request->term;
        $data->posted_year=$request->year;
        $data->classes=$request->classes;
        $data->description=$request->description;
        $data->status= 'unverified';


        //dd($data);

        $data->save();
        Toastr::success('Acitivity added successfully', 'success', ["positionClass" => "toast-bottom-left"]);

        return redirect()->back()->with('success', 'activities added successfully');


    }

    function verify_status($id)
    {
        $data = ModelsActivities::find($id);

        if (!$data)
        {
            return redirect()->back();
        }


        $data->status = 'verified';
        $data->update();

        Toastr::success('Activity verified successfully', 'success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back()->with('success', 'Activity verified successfully');

    }


    function loginLogs()
    {
        $logs = LoginLog::orderBy('created_at', 'desc')->get();
        return view('Admin.logs', compact('logs'));

    }

    function RegisterStudents(Request $request)
    {
        $data = new StudentRegister;

        $data->student_name = $request->student_name;
        $data->kcpe_marks = $request->kcpe_marks;
        $data->form = $request->form;
        $data->kcpe_year = $request->kcpe_year;
        $data->birthCertOrNemis = $request->birthCertOrNemis;
        $data->term = $request->term;
        $data->class = $request->class;
        $data->parent_phone= $request->parent_number;
        $data->unique_id = Str::random(32);

        $data->save();


        Toastr::success('Student Registered Successfully', 'success', ["positionClass" => "toast-bottom-left"]);

        return redirect()->back()->with('success', 'student registered successfully');
    }

    function promote_student($id, Request $request)
    {
        // Find the student by ID
        $data = StudentRegister::find($id);

        // Check if the student exists
        if (!$data) {
            return redirect()->back()->with('error', 'Student not found');
        } else {
            // Update the student's form and term based on the request
            $data->form = $request->input('form');
            $data->term = $request->input('term');

            // Save the changes to the database
            $data->save();

            // Use Toastr for success message (assuming you have Toastr set up)
            Toastr::success('success', 'Student promoted successfully', ["positionClass" => "toast-bottom-left"]);

            return redirect()->back()->with('success', 'Student promoted successfully');
        }
    }

    function AddingSkills(Request $request)
    {
        $data = new Skill();
        $student = StudentRegister::find($request->id);

        if (!$student) {
            // Handle the case where the student with the provided ID is not found
            return redirect()->back()->with('error', 'Student not found');
        }

        // Create a new Skill record and populate its fields
        $data = new Skill();
        $data->student_id = $student->id;
        $data->student_name = $student->student_name;
        $data->skill_title = $request->skill_title;
        $data->skill = $request->skill;

        // Save the new skill record to the database

        //return $data;

        $data->save();

        Toastr::success('success', 'successfully created new skill record',["positionClass" => "toast-bottom-left"]);

        return redirect()->back()->with('success', 'successfully  added new skills');

    }


    function StudentPunishment(Request $request)
    {
        // Create a new Punishment instance
        $data = new Punshment();

        // Assign values to the properties
        $data->student_name = $request->student_name;
        $data->form = $request->form;
        $data->reason = $request->reason;
        $data->from = now()->format('Y-m-d'); // Use now() and format() correctly
        $data->to = $request->to;

        // Save the data
        //$data->save();

        // Debugging: Dump the data to check
        dd($data);
    }

    public function Register_Leadership(Request $request)
    {
        $leadership=new Leadership();

        $student=StudentRegister::find($request->id);

        $leadership->studentRegNo=$student->id;
        $leadership->studentName=$student->name;


        return response()->json($leadership);
    }



}
