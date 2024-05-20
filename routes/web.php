<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'UserRedirects'])->name('home');


//Admin controller
Route::post('/term_activities', [App\Http\Controllers\MainController::class, 'admin_activities'])->name('admin_activities');

Route::post('verify_status/{id}', [App\Http\Controllers\MainController::class, 'verify_status'])->name('verify_status');

Route::get('/activities', [App\Http\Controllers\HomeController::class, 'ActivitiesAction'])->name('activities');

Route::get('/activity_details/{id}', [App\Http\Controllers\HomeController::class, 'activity_details'])->name('activity_details');

Route::get('loginlogs', [\App\Http\Controllers\MainController::class, 'loginlogs'])->name('login_logs');

Route::get('/students', [\App\Http\Controllers\HomeController::class, 'Students'])->name('student');

Route::get('/registered_students', [\App\Http\Controllers\HomeController::class, 'RegisteredStudents'])->name('registered_students');

Route::get('/adminprofile', [\App\Http\Controllers\HomeController::class, 'AdminProfile'])->name('adminprofile');

Route::get('/register_students', [\App\Http\Controllers\HomeController::class, 'RegisteringStudent'])->name('register_students');


Route::post('/doingregistration', [\App\Http\Controllers\MainController::class, 'RegisterStudents'])->name('RegisterStudents');

Route::get('/student_details/{unique_id}', [\App\Http\Controllers\HomeController::class, 'StudentDetails'])->name('student_details');


Route::post('/promte_student/{id}', [App\Http\Controllers\MainController::class, 'promote_student'])->name('promote_student');

Route::post('/adding_skills/{id}', [App\Http\Controllers\MainController::class, 'AddingSkills'])->name('adding_skills');

Route::post('/Register_Leadership', [App\Http\Controllers\MainController::class, 'Register_Leadership'])->name('Register_Leadership');
Route::get('/StudentLeadership', [App\Http\Controllers\HomeController::class, 'leadership'])->name('leadership');

//teachers
Route::get('/teachers', [App\Http\Controllers\HomeController::class, 'Teachers'])->name('teachers');

Route::get('/punishment', [App\Http\Controllers\HomeController::class, 'Punishment'])->name('Punishment');

Route::post('/add_punisment', [App\Http\Controllers\MainController::class, 'StudentPunishment'])->name('add_punisment');


Route::get('/welfare', [App\Http\Controllers\HomeController::class, 'Welfare'])->name('Welfare');


Route::get('/leaveout', [App\Http\Controllers\HomeController::class, 'leaveout'])->name('leaveout');

Route::get('/new_teacher', [App\Http\Controllers\HomeController::class, 'new_teacher'])->name('new_teacher');

Route::get('/employees', [App\Http\Controllers\HomeController::class, 'Employees'])->name(' Employees');

Route::get('/new_Employees', [App\Http\Controllers\HomeController::class, 'new_Employees'])->name('new_Employees');

Route::post('/RegisterTeacher', [App\Http\Controllers\MainController::class, 'RegisterTeacher'])->name('RegisterTeacher');

Route::get('/Communication', [App\Http\Controllers\HomeController::class, 'Communication'])->name('Communication');

Route::get('/Management', [App\Http\Controllers\HomeController::class, 'Management'])->name('Management');

Route::get('/Attedance', [App\Http\Controllers\HomeController::class, 'Attedance'])->name('Attedance');

Route::get('/Examination', [App\Http\Controllers\HomeController::class, 'Examination'])->name('Examination');

Route::post('/Employees_Store', [App\Http\Controllers\MainController::class, 'Employees_Store'])->name('employees.store');





;

