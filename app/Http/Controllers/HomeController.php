<?php

namespace App\Http\Controllers;

use App\Models\Leadership;
use Illuminate\Http\Request;
use App\Models\Activities;
use Brian2694\Toastr\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\LoginLog;
use App\Models\Skill;
use App\Models\StudentRegister;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function ActivitiesAction()
    {
        $data= Activities::all();
        return view('Admin.activities', compact('data'));
    }
    public function Activity_details($id)
    {
        $activity = Activities::find($id);

        if (!$activity) {

            Toastr::error('Activity not found', 'error', ["positionClass" => "toast-bottom-right"]);
            return redirect()->back()->with('error', 'Activity not found.');
        }

        return view('Admin.activity _details', compact('activity'));
    }

    public function UserRedirects()
    {
        // Record login logs
        $user = Auth::user();
        $ip = request()->ip();
        Log::info('User logged in. Name: ' . $user->name . ', IP: ' . request()->ip());

        $log = new LoginLog();
        $log->username = $user->name;
        $log->phone = $user->phone; // Assuming 'phone' is a field in the User model
        $log->email = $user->email;
        $log->save();

        // Determine the redirect path based on usertype and status
        $redirectPath = '';

        if ($user->usertype == 'admin') {
            return view('admin.index'); // Redirect to the admin index page
        } elseif ($user->usertype == 'student') {
            if ($user->status == 'inactive') {
                return view('inactive'); // Display the inactive view
            }
            return view('student.index'); // Redirect to the student index page
        } elseif ($user->usertype == 'teacher') {
            return view('teacher.index'); // Redirect to the teacher index page
        } else {
            return 'error in this application, contact the administrator';
        }
    }

    function Students()
    {
        $data=StudentRegister::all();
        return view('Admin.students', compact('data'));
    }

    function RegisteredStudents()
    {
        //$data = StudentRegister::all();
        // Fetch the latest 10 records
        $data = StudentRegister::latest()->take(10)->get();
        return view('Admin.registered_students', compact('data'));
    }
    function adminProfile()
    {
        $user = Auth::user();
        return view('Admin.AdminProfile', compact('user'));
    }

    function RegisteringStudent()
    {
        return view('Admin.register_students');
    }

    function StudentDetails($unique_id)
    {
        // Find the student record by unique_id
        $student = StudentRegister::with('skills')->where('unique_id', $unique_id)->first();


        // Check if a student was found
        if (!$student) {
            abort(404); // Return a 404 error if the student with the unique_id is not found
        }

        // Pass the student data to the view
        //dd($student);
       return view('Admin.student_details', compact('student'));
    }


    function Teachers()
    {

        return view('Admin.teachers');
    }

    function Punishment()
    {
        $data=StudentRegister::all();
        return view('Admin.Punishment', compact('data'));

    }

    function Welfare()
    {
        return view('Admin.welfare');
    }

    function leaveout()
    {
        $students=StudentRegister::all();
        return view('Admin.Leaveout', compact('students'));
    }

    public function searchStudents(Request $request)
    {
        $searchText = $request->input('searchText');

        // Perform a search query to find students based on $searchText
        $students = StudentRegister::where('id', 'like', '%' . $searchText . '%')
            ->orWhere('name', 'like', '%' . $searchText . '%')
            ->get();

        return response()->json($students);
    }

    public function leadership()
    {
        $data= Leadership::all();
        $student= StudentRegister::all();
        return view('Admin.leadership', compact('data', 'student'));
    }

    public function new_teacher()
    {
        return view('Admin.newTeacher');
    }

    public function Employees()
    {
        return view('Admin.Employees');
    }












}
