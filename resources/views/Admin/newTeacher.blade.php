@extends('Admin.app')

@section('content')

    <style>
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
                <form>
                    <!-- Personal Information Card -->
                    <div class="card mb-3 border-primary">
                        <div class="card-header bg-primary text-white">
                            Personal Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" id="fullName" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="tel" class="form-control" id="phoneNumber" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" required>
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" required>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
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
                                <input type="text" class="form-control" id="employeeId" required>
                            </div>
                            <div class="form-group">
                                <label for="jobTitle">Job Title</label>
                                <input type="text" class="form-control" id="jobTitle" required>
                            </div>
                            <div class="form-group">
                                <label for="subjectsTaught">Subjects Taught</label>
                                <input type="text" class="form-control" id="subjectsTaught" required>
                            </div>
                            <div class="form-group">
                                <label for="department">Department or Grade Level Assigned</label>
                                <input type="text" class="form-control" id="department" required>
                            </div>
                            <div class="form-group">
                                <label>Employment Status</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="employmentStatus" id="fullTime" value="full-time" required>
                                    <label class="form-check-label" for="fullTime">Full-time</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="employmentStatus" id="partTime" value="part-time">
                                    <label class="form-check-label" for="partTime">Part-time</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="employmentStatus" id="substitute" value="substitute">
                                    <label class="form-check-label" for="substitute">Substitute</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hireDate">Hire Date</label>
                                <input type="date" class="form-control" id="hireDate" required>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary or Pay Grade</label>
                                <input type="text" class="form-control" id="salary" required>
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
                                <input type="text" class="form-control" id="degrees" required>
                            </div>
                            <div class="form-group">
                                <label for="institutions">Universities or Institutions Attended</label>
                                <input type="text" class="form-control" id="institutions" required>
                            </div>
                            <div class="form-group">
                                <label for="major">Major or Specialization</label>
                                <input type="text" class="form-control" id="major" required>
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
                                <input type="number" class="form-control" id="yearsExperience" required>
                            </div>
                            <div class="form-group">
                                <label for="previousSchools">Previous Schools or Districts Worked At</label>
                                <input type="text" class="form-control" id="previousSchools" required>
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
                                <input type="text" class="form-control" id="trainingCourses" required>
                            </div>
                            <div class="form-group">
                                <label for="certifications">Certifications or Licenses Obtained</label>
                                <input type="text" class="form-control" id="certifications" required>
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
                                <input type="text" class="form-control mb-2" id="emergencyContactName" placeholder="Name" required>
                                <input type="text" class="form-control mb-2" id="emergencyContactRelationship" placeholder="Relationship" required>
                                <input type="tel" class="form-control" id="emergencyContactPhone" placeholder="Phone Number" required>
                            </div>
                            <div class="form-group">
                                <label for="attendanceRecords">Attendance or Leave Records</label>
                                <textarea class="form-control" id="attendanceRecords" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="performanceEvaluations">Performance Evaluations or Appraisals</label>
                                <textarea class="form-control" id="performanceEvaluations" rows="3" required></textarea>
                            </div>
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
