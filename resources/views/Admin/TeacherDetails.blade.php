@extends('Admin.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .profile-img {
            width: 150px;
            height: 150px;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        @media only screen and (max-width: 767px) {
            .profile-img {
                width: 100px;
                height: 100px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            }
        }

        .card-title {
            font-family: 'Roboto', sans-serif;
            letter-spacing: 1px;
        }

        .fw-bold {
            font-weight: bold;
        }

        .list-group-item span {
            font-weight: bold;
            color: #000;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .btn-fancy {
            background-color: #6f42c1;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-fancy:hover {
            background-color: #563d7c;
        }

        .container {

        }

        .fancy-list .list-group-item {
            background-color: #f8f9fa;
            border: none;
            padding: 15px;
            margin-bottom: 5px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .fancy-list .list-group-item span {
            color: #007bff;
        }

        @media only screen and (max-width: 767px) {
            .card {
                margin-bottom: 20px;
            }

            .table thead tr {
                background-color: #0062cc;
            }
        }

        /* Center modal on the screen */
        .modal-dialog-centered {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100% - 1rem);
        }

        /* Input field styling */
        .modal-content .form-control {
            background-color: white;
            color: black;
        }

        .modal-content .form-control:focus {
            background-color: white;
            color: black;
        }
    </style>

    <!-- Profile Header -->
    <div class="Teachers-profile">
        <div class="container">
            <div class="row">
                <!-- Profile Picture and Cover Image -->
                <div class="col-md-3 col-sm-12 mb-3">
                    <div class="card shadow-lg border-primary text-center">
                        <img src="{{ $teacher->profile_picture_url ?? 'https://media.istockphoto.com/id/1327592506/vector/default-avatar-photo-placeholder-icon-grey-profile-picture-business-man.jpg?s=612x612&w=0&k=20&c=BpR0FVaEa5F24GIw7K8nMWiiGmbb8qmhfkpXcp1dhQg=' }}" class="card-img-top rounded-circle profile-img" alt="Profile Picture">
                        <div class="card-body text-center">
                            <h5 class="card-title text-primary fw-bold mb-0">Welcome {{$teacher->full_name}}</h5>
                            <!-- Edit Profile Button -->
                            <a href="#" class="btn btn-primary btn-sm mt-2">Edit Profile</a>
                        </div>
                    </div>
                </div>
                <!-- Personal Information -->
                <div class="col-md-9 col-sm-12 mb-3">
                    <div class="card shadow-lg border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold mb-4">Personal Information</h5>
                            <ul class="list-group list-group-flush fancy-list">
                                <li class="list-group-item"><span class="fw-bold">Full Name:</span> {{$teacher->full_name}}</li>
                                <li class="list-group-item"><span class="fw-bold">Email:</span> {{$teacher->email}}</li>
                                <li class="list-group-item"><span class="fw-bold">Phone Number:</span> {{$teacher->phone_number}}</li>
                                <li class="list-group-item"><span class="fw-bold">Address:</span> {{$teacher->address}}</li>
                                <li class="list-group-item"><span class="fw-bold">Date of Birth:</span> {{$teacher->date_of_birth}}</li>
                                <li class="list-group-item"><span class="fw-bold">Gender:</span> {{$teacher->gender}}</li>
                                <li class="list-group-item"><span class="fw-bold">Employee ID:</span> {{$teacher->employee_id}}</li>
                                <li class="list-group-item"><span class="fw-bold">Subject Taught:</span> {{$teacher->subject_taught}}</li>
                                <li class="list-group-item"><span class="fw-bold">Department:</span> {{$teacher->department}}</li>
                                <li class="list-group-item"><span class="fw-bold">Hire Date:</span> {{$teacher->hire_date}}</li>
                                <li class="list-group-item"><span class="fw-bold">Salary:</span> {{$teacher->salary}}</li>
                                <li class="list-group-item"><span class="fw-bold">Emergency Contact Name:</span> {{$teacher->emergency_contact_name}}</li>
                                <li class="list-group-item"><span class="fw-bold">Emergency Contact Relationship:</span> {{$teacher->emergency_contact_relationship}}</li>
                                <li class="list-group-item"><span class="fw-bold">Emergency Contact Phone:</span> {{$teacher->emergency_contact_phone}}</li>
                            </ul>
                        </div>
                        <!-- Buttons for Actions -->
                        <div class="container mt-4 text-center">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <a href="#" class="btn btn-fancy btn-block" data-toggle="modal" data-target="#addMarksModal">Add Marks</a>
                                </div>
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <a href="#" class="btn btn-fancy btn-block" data-toggle="modal" data-target="#takeRegisterModal">Take Class Register</a>
                                </div>
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <a href="#" class="btn btn-fancy btn-block" data-toggle="modal" data-target="#requestLeaveModal">Request Leave</a>
                                </div>
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <a href="#" class="btn btn-fancy btn-block" data-toggle="modal" data-target="#sendMessageModal">Send Message to Admin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Details -->
        <div class="container mt-4">
            <div class="card shadow-lg border-primary">
                <div class="card-body">
                    <h5 class="card-title text-primary fw-bold mb-4">Performance Details</h5>
                    <!-- Performance Metrics Table -->
                    <div class="table-responsive">
                        <table class="table table-striped" style="background-color: #ffe0e6;">
                            <thead>
                            <tr style="background-color: #004085; color: whitesmoke;">
                                <th class="text-light fw-bold">Class</th>
                                <th class="text-light fw-bold">Average Grade</th>
                                <th class="text-light fw-bold">Attendance Rate</th>
                                <th class="text-light fw-bold">Test Scores</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- @foreach($teacher->performance_details as $performance) --}}
                            {{-- <tr> --}}
                            {{-- <td>{{ $performance->class }}</td> --}}
                            {{-- <td>{{ $performance->average_grade }}%</></td> --}}
                            {{-- <td>{{ $performance->attendance_rate }}%</></td> --}}
                            {{-- <td>{{ $performance->test_scores }}%</></td> --}}
                            {{-- </tr> --}}
                            {{-- @endforeach --}}
                            <!-- Add more rows for other classes -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Role Management -->
        <div class="container mt-4">
            <div class="card shadow-lg border-primary">
                <div class="card-body">
                    <h5 class="card-title text-primary fw-bold mb-4">Role Management</h5>
                    <!-- Assigned Roles -->
                    <ul class="list-group">
                        {{-- @foreach($teacher->roles as $role) --}}
                        {{-- <li class="list-group-item">{{ $role->role_name }} - <span class="text-primary">{{ $role->role_description }}</span></li> --}}
                        {{-- @endforeach --}}
                        <!-- Add more roles -->
                    </ul>
                    <!-- Edit Roles Button -->
                    <a href="#" class="btn btn-primary mt-3">Edit Roles</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Marks Modal -->
    <div class="modal fade" id="addMarksModal" tabindex="-1" role="dialog" aria-labelledby="addMarksModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMarksModalLabel">Add Marks</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add Marks Form -->
                    <form>
                        <!-- Your form fields here -->
                        <div class="form-group">
                            <label for="studentId">Student ID</label>
                            <input type="text" class="form-control" id="studentId" name="studentId" required>
                        </div>
                        <div class="form-group">
                            <label for="marks">Marks</label>
                            <input type="number" class="form-control" id="marks" name="marks" required>
                        </div>
                        <!-- Add more fields as necessary -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Take Class Register Modal -->
    <div class="modal fade" id="takeRegisterModal" tabindex="-1" role="dialog" aria-labelledby="takeRegisterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="takeRegisterModalLabel">Take Class Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Take Register Form -->
                    <form>
                        <!-- Your form fields here -->
                        <div class="form-group">
                            <label for="class">Class</label>
                            <input type="text" class="form-control" id="class" name="class" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <!-- Add more fields as necessary -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Request Leave Modal -->
    <div class="modal fade" id="requestLeaveModal" tabindex="-1" role="dialog" aria-labelledby="requestLeaveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestLeaveModalLabel">Request Leave</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Request Leave Form -->
                    <form method="post" action="{{ route('RequestLeave', $teacher->id) }}">
                        @csrf
                        <!-- Leave Type Dropdown with select2 -->
                        <div class="form-group">
                            <label for="leaveType">Leave Type</label>
                            <select class="form-control select2" id="leaveType" name="leaveType" required>
                                <option value="annual">Annual Leave</option>
                                <option value="maternity_paternity">Maternity & Paternity Leave</option>
                                <option value="compassionate">Compassionate Leave</option>
                                <option value="study">Study Leave</option>
                                <option value="special">Special Leave</option>
                                <option value="diplomat_spouse">Leave to Spouses of Diplomats</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="startDate">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="startDate" required>
                        </div>
                        <div class="form-group">
                            <label for="endDate">End Date</label>
                            <input type="date" class="form-control" id="endDate" name="endDate" required>
                        </div>
                        <div class="form-group">
                            <label for="reason">Reason</label>
                            <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                        </div>
                        <!-- Add more fields as necessary -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Send Message to Admin Modal -->
    <div class="modal fade" id="sendMessageModal" tabindex="-1" role="dialog" aria-labelledby="sendMessageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sendMessageModalLabel">Send Message to Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Send Message Form -->
                    <form>
                        <!-- Your form fields here -->
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                        <!-- Add more fields as necessary -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include select2 CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize select2 on leaveType dropdown
            $('.select2').select2();
        });
    </script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


@endsection
