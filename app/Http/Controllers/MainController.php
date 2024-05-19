<?php

namespace App\Http\Controllers;

use App\Models\Activities as ModelsActivities;
use App\Models\Employee;
use App\Models\Leadership;
use App\Models\Teacher;
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

        $request->validate([
            'student_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'form' => 'required|string|max:255',
            'term' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'birthCertOrNemis' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:255',
            'kcpe_marks' => 'required|integer',
            'kcpe_year' => 'required|integer',
            'parent_name' => 'required|string|max:255',
            'parent_Phone' => 'required|string|max:255',
        ]);

        $data = new StudentRegister();

        $data->student_name = $request->student_name;
        $data->email = $request->email;
        $data->form = $request->form;
        $data->term = $request->term;
        $data->class = $request->class;
        $data->birth_cert_or_nemis = $request->birthCertOrNemis;
        $data->address = $request->address;
        $data->date_of_birth = $request->date_of_birth;
        $data->gender = $request->gender;
        $data->kcpe_marks = $request->kcpe_marks;
        $data->kcpe_year = $request->kcpe_year;
        $data->parent_name = $request->parent_name;
        $data->parent_phone = $request->parent_Phone;
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

    public function RegisterTeacher(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:teachers',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:10',
            'employee_id' => 'required|string|max:50|unique:teachers',
            'job_title' => 'required|string|max:255',
            'subjects_taught' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'employment_status' => 'required|string|max:20',
            'hire_date' => 'required|date',
            'salary' => 'required|string|max:100',
            'degrees' => 'required|string|max:255',
            'institutions' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'years_experience' => 'required|integer',
            'previous_schools' => 'required|string|max:255',
            'training_courses' => 'required|string|max:255',
            'certifications' => 'required|string|max:255',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_relationship' => 'required|string|max:255',
            'emergency_contact_phone' => 'required|string|max:20',
            'attendance_records' => 'required|string',
            'performance_evaluations' => 'required|string',
        ]);

        $teacher = new Teacher();

        $teacher->full_name = $request->full_name;
        $teacher->email = $request->email;
        $teacher->phone_number = $request->phone_number;
        $teacher->address = $request->address;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->gender = $request->gender;
        $teacher->employee_id = $request->employee_id;
        $teacher->job_title = $request->job_title;
        $teacher->subjects_taught = $request->subjects_taught;
        $teacher->department = $request->department;
        $teacher->employment_status = $request->employment_status;
        $teacher->hire_date = $request->hire_date;
        $teacher->salary = $request->salary;
        $teacher->degrees = $request->degrees;
        $teacher->institutions = $request->institutions;
        $teacher->major = $request->major;
        $teacher->years_experience = $request->years_experience;
        $teacher->previous_schools = $request->previous_schools;
        $teacher->training_courses = $request->training_courses;
        $teacher->certifications = $request->certifications;
        $teacher->emergency_contact_name = $request->emergency_contact_name;
        $teacher->emergency_contact_relationship = $request->emergency_contact_relationship;
        $teacher->emergency_contact_phone = $request->emergency_contact_phone;
        $teacher->attendance_records = $request->attendance_records;
        $teacher->performance_evaluations = $request->performance_evaluations;

        $teacher->save();

        Toastr::success('Teacher registered successfully', 'Success', ["positionClass" => "toast-bottom-left"]);


        return redirect()->back()->with('success', 'teacher successfully registered');
    }

    public function Employees_Store(Request $request)
    {
        $data= new Employee();

        return response()->json('hi there');
    }



}
