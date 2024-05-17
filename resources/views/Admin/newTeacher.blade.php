@extends('Admin.app')

@section('content')

    <style>

        .container-fluid{
            background: #0dcaf0;
        }
        /* Custom CSS for fancy form styling */

        /* Label styling */
        label {
            float: left; /* Align labels to the left */
            margin-bottom: 0.5rem; /* Add spacing between labels */
        }

        /* Input field styling */
        .form-control {
            background-color: #f8f9fa; /* Set background color */
            color: #495057; /* Set text color */
            border-color: #ced4da; /* Set border color */
        }

        /* Adjust input field margin to create space between label and input field */
        .form-group {
            margin-bottom: 1.5rem; /* Add space between form groups */
        }

        /* Additional styling for radio buttons */
        .form-check-input {
            margin-top: 0.2rem; /* Adjust radio button alignment */
        }
        /* Fancy color effect on focus */
        .form-control:focus {
            background-color: #e9ecef; /* Set fancy background color on focus */
            border-color: #80bdff; /* Set fancy border color on focus */
        }

    </style>


    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Register students</h6>
            </div>

            <div >
                <form method="post" action="{{ route('RegisterTeacher') }}">
                    @csrf
                    <!-- Personal Information Card -->
                    <div class="card mb-3 border-primary">
                        <div class="card-header bg-primary text-white">
                            Personal Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="full_name" value="{{ old('full_name') }}" required>
                                @error('full_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="tel" class="form-control" id="phoneNumber" name="phone_number" value="{{ old('phone_number') }}" required>
                                @error('phone_number')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                @error('date_of_birth')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="" disabled selected>Select gender</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Employment Information Card -->
                    <div class="card mb-3 border-success">
                        <div class="card-header bg-success text-white">
                            Employment Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="employeeId">Employee ID or Staff Number</label>
                                <input type="text" class="form-control" id="employeeId" name="employee_id" value="{{ old('employee_id') }}" required>
                                @error('employee_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jobTitle">Job Title</label>
                                <input type="text" class="form-control" id="jobTitle" name="job_title" value="{{ old('job_title') }}" required>
                                @error('job_title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subjectsTaught">Subjects Taught</label>
                                <input type="text" class="form-control" id="subjectsTaught" name="subjects_taught" value="{{ old('subjects_taught') }}" required>
                                @error('subjects_taught')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="department">Department or Grade Level Assigned</label>
                                <input type="text" class="form-control" id="department" name="department" value="{{ old('department') }}" required>
                                @error('department')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Employment Status</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="employment_status" id="fullTime" value="full-time" {{ old('employment_status') == 'full-time' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="fullTime">Full-time</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="employment_status" id="partTime" value="part-time" {{ old('employment_status') == 'part-time' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="partTime">Part-time</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="employment_status" id="substitute" value="substitute" {{ old('employment_status') == 'substitute' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="substitute">Substitute</label>
                                </div>
                                @error('employment_status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="hireDate">Hire Date</label>
                                <input type="date" class="form-control" id="hireDate" name="hire_date" value="{{ old('hire_date') }}" required>
                                @error('hire_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary or Pay Grade</label>
                                <input type="text" class="form-control" id="salary" name="salary" value="{{ old('salary') }}" required>
                                @error('salary')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Educational Background Card -->
                    <div class="card mb-3 border-info">
                        <div class="card-header bg-info text-white">
                            Educational Background
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="degrees">Degrees or Certifications Held</label>
                                <input type="text" class="form-control" id="degrees" name="degrees" value="{{ old('degrees') }}" required>
                                @error('degrees')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="institutions">Universities or Institutions Attended</label>
                                <input type="text" class="form-control" id="institutions" name="institutions" value="{{ old('institutions') }}" required>
                                @error('institutions')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="major">Major or Specialization</label>
                                <input type="text" class="form-control" id="major" name="major" value="{{ old('major') }}" required>
                                @error('major')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Teaching Experience Card -->
                    <div class="card mb-3 border-warning">
                        <div class="card-header bg-warning text-white">
                            Teaching Experience
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="yearsExperience">Years of Teaching Experience</label>
                                <input type="number" class="form-control" id="yearsExperience" name="years_experience" value="{{ old('years_experience') }}" required>
                                @error('years_experience')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="previousSchools">Previous Schools or Districts Worked At</label>
                                <input type="text" class="form-control" id="previousSchools" name="previous_schools" value="{{ old('previous_schools') }}" required>
                                @error('previous_schools')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Professional Development Card -->
                    <div class="card mb-3 border-secondary">
                        <div class="card-header bg-secondary text-white">
                            Professional Development
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="trainingCourses">Training Courses Attended</label>
                                <input type="text" class="form-control" id="trainingCourses" name="training_courses" value="{{ old('training_courses') }}" required>
                                @error('training_courses')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="certifications">Certifications or Licenses Obtained</label>
                                <input type="text" class="form-control" id="certifications" name="certifications" value="{{ old('certifications') }}" required>
                                @error('certifications')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information Card -->
                    <div class="card mb-3 border-dark">
                        <div class="card-header bg-dark text-white">
                            Additional Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="emergencyContact">Emergency Contact Details</label>
                                <input type="text" class="form-control mb-2" id="emergencyContactName" name="emergency_contact_name" placeholder="Name" value="{{ old('emergency_contact_name') }}" required>
                                @error('emergency_contact_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" class="form-control mb-2" id="emergencyContactRelationship" name="emergency_contact_relationship" placeholder="Relationship" value="{{ old('emergency_contact_relationship') }}" required>
                                @error('emergency_contact_relationship')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="tel" class="form-control" id="emergencyContactPhone" name="emergency_contact_phone" placeholder="Phone Number" value="{{ old('emergency_contact_phone') }}" required>
                                @error('emergency_contact_phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--                        <div class="form-group">--}}
                            {{--                            <label for="attendanceRecords">Attendance or Leave Records</label>--}}
                            {{--                            <textarea class="form-control" id="attendanceRecords" name="attendance_records" rows="3" required>{{ old('attendance_records') }}</textarea>--}}
                            {{--                            @error('attendance_records')--}}
                            {{--                                <span class="text-danger">{{ $message }}</span>--}}
                            {{--                            @enderror--}}
                            {{--                        </div>--}}
                            {{--                        <div class="form-group">--}}
                            {{--                            <label for="performanceEvaluations">Performance Evaluations or Appraisals</label>--}}
                            {{--                            <textarea class="form-control" id="performanceEvaluations" name="performance_evaluations" rows="3" required>{{ old('performance_evaluations') }}</textarea>--}}
                            {{--                            @error('performance_evaluations')--}}
                            {{--                                <span class="text-danger">{{ $message }}</span>--}}
                            {{--                            @enderror--}}
                            {{--                        </div>--}}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
