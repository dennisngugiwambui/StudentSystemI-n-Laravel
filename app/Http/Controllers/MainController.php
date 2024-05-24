<?php

namespace App\Http\Controllers;

use App\Models\Activities as ModelsActivities;
use App\Models\Communication;
use App\Models\Employee;
use App\Models\Leadership;
use App\Models\NonTeachingStuff;
use App\Models\Teacher;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Toastr;
use Illuminate\Support\Facades\Auth;
use App\Models\LoginLog;
use App\Models\Skill;
use App\Models\StudentRegister;
use App\Models\Punshment as Punshment;
use Brian2694\Toastr\Toastr as ToastrToastr;
use Illuminate\Support\Str;
use AfricasTalking\SDK\AfricasTalking;


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
        $data->email = 'N/A';
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

        //return response()->json($data);


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
            'attendance_records' => 'nullable|string',
            'performance_evaluations' => 'nullable|string',
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
       // $teacher->attendance_records = $request->attendance_records;
       // $teacher->performance_evaluations = $request->performance_evaluations;
        //$teacher->unique_id = Str::random(32);

        $teacher->save();

        //return response()->json($teacher);

        Toastr::success('Teacher registered successfully', 'Success', ["positionClass" => "toast-bottom-left"]);

        return redirect()->back()->with('success', 'Teacher successfully registered');
    }


    public function Employees_Store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'nationality' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_phone' => 'required|string|max:20',
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'employment_type' => 'required|string|max:255',
            'date_of_joining' => 'required|date',
            'salary' => 'required|numeric',
            'highest_degree' => 'required|string|max:255',
            'institution_name' => 'required|string|max:255',
            'year_of_completion' => 'required|integer|min:1900',
            'government_id' => 'required|string|max:255',
            'social_security_number' => 'required|string|max:255',
            'criminal_record_check' => 'required|boolean',
            'bank_account_number' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'branch_name' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
        ]);

        $data = new Employee();

        $data->full_name = $request->full_name;
        $data->date_of_birth = $request->date_of_birth;
        $data->gender = $request->gender;
        $data->nationality = $request->nationality;
        $data->address = $request->address;
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->emergency_contact_name = $request->emergency_contact_name;
        $data->emergency_contact_phone = $request->emergency_contact_phone;
        $data->designation = $request->designation;
        $data->department = $request->department;
        $data->employment_type = $request->employment_type;
        $data->date_of_joining = $request->date_of_joining;
        $data->salary = $request->salary;
        $data->highest_degree = $request->highest_degree;
        $data->institution_name = $request->institution_name;
        $data->year_of_completion = $request->year_of_completion;
        $data->government_id = $request->government_id;
        $data->social_security_number = $request->social_security_number;
        $data->criminal_record_check = $request->criminal_record_check;
        $data->reference_contact_name = $request->reference_contact_name;
        $data->reference_contact_phone = $request->reference_contact_phone;
        $data->bank_account_number = $request->bank_account_number;
        $data->bank_name = $request->bank_name;
        $data->branch_name = $request->branch_name;
        $data->payment_method = $request->payment_method;
        $data->medical_history = $request->medical_history;
        $data->disability_status = $request->disability_status;
        $data->skills_certifications = $request->skills_certifications;
        $data->unique_id = Str::random(32);

        $data->save();

        //return response()->json($group);
        Toastr::success('Employee data added successfully', 'Success', ["positionClass" => "toast-bottom-left"]);

        return redirect()->back()->with('success', 'Employee data added successfully');
    }


    public function new_Communication(Request $request)
    {
        // Validate the request
        $request->validate([
            'recipient_group' => 'required|array',
            'form_group' => 'required|array',
            'event_name' => 'required|string',
            'other_event_name' => 'nullable|string',
            'event_date' => 'required|date',
            'event_time' => 'required|date_format:H:i',
            'message_content' => 'nullable|string'
        ]);

        // Save the communication details
        $communication = new Communication();
        $communication->recipient_group = json_encode($request->recipient_group);
        $communication->form_group = json_encode($request->form_group);
        $communication->event_name = $request->event_name;
        $communication->other_event_name = $request->event_name === 'other' ? $request->other_event_name : null;
        $communication->event_date = $request->event_date;
        $communication->event_time = $request->event_time;
        $communication->message_content = $request->message_content;
        $communication->unique_id=Str::random(32);
        $communication->save();



        // Send SMS to the appropriate groups
        foreach ($request->recipient_group as $group) {
            switch ($group) {
                case "Parents":
                    $this->sendSmsToGroup(StudentRegister::whereNotNull('parent_phone')->pluck('parent_phone')->toArray(), 'parent', $request);
                    break;
                case "Teachers":
                    $this->sendSmsToGroup(Teacher::whereNotNull('phone')->pluck('phone')->toArray(), 'teacher', $request);
                    break;
                case "Non Teaching Staff":
                    $this->sendSmsToGroup(NonTeachingStuff::whereNotNull('phone')->pluck('phone')->toArray(), 'non-teaching staff', $request);
                    break;
            }
        }

        //return response()->json($group);
        Toastr::success('Communication added successfully', 'Success', ["positionClass" => "toast-bottom-left"]);

        return redirect()->back()->with('success', 'Communication added successfully');
    }

    // Helper method to send SMS to a group
    private function sendSmsToGroup(array $phones, string $recipientType, Request $request)
    {
        foreach ($phones as $phone) {
            $sms = $this->composeMessage($recipientType, $request);
            $this->sendSms($phone, $sms);
        }
    }

    // Method to send SMS
    public function sendSms(string $number, string $message)
    {
        $username = 'dennohosi';
        $apiKey = getenv('AT_API_KEY');
        $AT = new AfricasTalking($username, $apiKey);

        $sms = $AT->sms();
        $result = $sms->send([
            'to' => $number,
            'message' => $message,
        ]);

        \Log::info("SMS sent to $number: " . json_encode($result));
    }

    // Method to compose SMS message
    protected function composeMessage($recipientType, $request)
    {
        $schoolAddress = "1234 Elm Street, Springfield, IL 62704";

        $message = "Hello dear $recipientType,\n\n";
        $message .= "Pixel Solution School would like to inform you about the event: ";
        $message .= $request->event_name === 'other' ? $request->other_event_name : $request->event_name;
        $message .= "\nDate: " . $request->event_date;
        $message .= "\nStarting at: " . $request->event_time;
        $message .= "\nThe classes included are: " . implode(', ', $request->form_group);
        $message .= "\n\nAdditional comments: " . $request->message_content;
        $message .= "\n\nSchool address: $schoolAddress";

        return $message;
    }




}
