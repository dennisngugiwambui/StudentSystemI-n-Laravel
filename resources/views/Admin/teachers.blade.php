@extends('Admin.app')

@section('content')


    <style>
        .container-fluid{
            background: #0dcaf0;
        }
        /* Custom CSS for fancy button styling */
        .fancy-button {
            background-color: #8d0d0d; /* Blue background */
            color: #fff; /* White text color */
            border: none; /* No border */
            padding: 8px 16px; /* Padding */
            border-radius: 5px; /* Rounded corners */
            text-decoration: none; /* Remove default underline */
            transition: background-color 0.3s; /* Smooth transition for background color */
        }

        .fancy-button:hover {
            background-color: #b3b3b3; /* Darker blue background on hover */
        }

    </style>

    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <a href="" class="text-decoration-none">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"> </i>
                        <div class="ms-3">
                            <p class="mb-2">New Marks</p>
                            <h6 class="mb-0">2932</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-3">
                <a href="" class="text-decoration-none">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Register</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-3">
                <a href="" class="text-decoration-none">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-area fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Leadership</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Rewards</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->




    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Teachers Record</h6>
                <a href="/new_teacher" class="btn btn-danger"><i class="fa fa-plus"></i>New Teacher </a>
            </div>
            <div class="table-responsive">
                <div class="mb-3 text-white">
                    <input type="text" id="searchTable" class="form-control bg-dark border-0" style="color: #fff;"
                           placeholder="Search">
                </div>
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead
                    <tr class="text-white">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Major</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    the loop to get the teacher data--}}
                    @foreach($teacher as $data)
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>{{$data->full_name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone_number}}</td>
                            <td>{{$data->gender}}</td>
                            <td>{{$data->major}}</td>
                            <td><a class="btn btn-sm btn-primary fancy-button" href="{{ route('TeacherDetails', ['unique_id' => $data->unique_id]) }}"><i class="fa fa-eye"></i> </a></td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->



@endsection
