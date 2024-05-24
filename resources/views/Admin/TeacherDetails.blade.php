@extends('Admin.app')

@section('content')

    <!-- Profile Header -->
    <div class="Teachers-profile" style="background-color: #f0f0f0;">
        <div class="container">
            <div class="row">
                <!-- Profile Picture and Cover Image -->
                <div class="col-md-4 mb-3">
                    <div class="card shadow-lg border-primary">
                        <img src="teacher-profile-image.jpg" class="card-img-top rounded-circle" alt="Profile Picture">
                        <div class="card-body text-center">
                            <h5 class="card-title text-primary fw-bold mb-0">Teacher's Name</h5>
                            <!-- Edit Profile Button -->
                            <a href="#" class="btn btn-primary btn-sm mt-2">Edit Profile</a>
                        </div>
                    </div>
                </div>
                <!-- Personal Information -->
                <div class="col-md-8 mb-3">
                    <div class="card shadow-lg border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold mb-4">Personal Information</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class="fw-bold">Full Name:</span> John Doe</li>
                                <li class="list-group-item"><span class="fw-bold">Email:</span> johndoe@example.com</li>
                                <li class="list-group-item"><span class="fw-bold">Phone Number:</span> +1234567890</li>
                                <li class="list-group-item"><span class="fw-bold">Address:</span> 123 Main St, City</li>
                                <li class="list-group-item"><span class="fw-bold">Date of Birth:</span> January 1, 1980</li>
                                <li class="list-group-item"><span class="fw-bold">Gender:</span> Male</li>
                            </ul>
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
                    <table class="table table-striped" style="background-color: #ffe0e6; color: white;">
                        <thead>
                        <tr style="background-color: #004085; color: whitesmoke;">
                            <th class="text-light fw-bold">Class</th>
                            <th class="text-light fw-bold">Average Grade</th>
                            <th class="text-light fw-bold">Attendance Rate</th>
                            <th class="text-light fw-bold">Test Scores</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Mathematics</td>
                            <td>85%</td>
                            <td>95%</td>
                            <td>90%</td>
                        </tr>
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
                    <li class="list-group-item">Subject Teacher - <span class="text-primary">Mathematics</span></li>
                    <li class="list-group-item">Grade Level - <span class="text-primary">9th Grade</span></li>
                    <!-- Add more roles -->
                </ul>
                <!-- Edit Roles Button -->
                <a href="#" class="btn btn-primary mt-3">Edit Roles</a>
            </div>
        </div>
    </div>

@endsection
