@extends('Admin.app')

@section('content')

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- Custom CSS for dark theme -->
    <style>
        .modal-content {
            background-color: #2d2f33;
            color: #ffffff;
        }
        .form-control, .select2-container .select2-selection--single {
            background-color: #3e4044;
            color: #ffffff;
            border: 1px solid #555;
        }
        .form-control:focus, .select2-container .select2-selection--single:focus {
            background-color: #3e4044;
            color: #ffffff;
            border-color: #777;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-close {
            filter: invert(1);
        }
        .modal-header, .modal-footer {
            border-bottom: 1px solid #444;
            border-top: 1px solid #444;
        }
        input{
            background: #0dcaf0;
        }
    </style>







    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Roles for students</h6>


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerLeadershipModal">
                    <i class="fa fa-plus"></i> New Role
                </button>

            </div>
            <div class="table-responsive">
                <div class="mb-3 text-white">
                    <input type="text" id="searchTable" class="form-control bg-dark border-0" style="color: #fff;"
                           placeholder="Search">
                </div>
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                    <tr class="text-white">
                        <th scope="col">Reg No.</th>
                        <th scope="col">Role</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody id="myTable">
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->form }}</td>
                            <td>{{ $item->term }}</td>
                            <td>{{ $item->student_name }}</td>
                            <td>{{ $item->parent_phone }}</td>
                            <td><a class="btn btn-sm btn-primary" href="{{ route('student_details', ['unique_id' => $item->unique_id]) }}"><i class="fas fa-user"></i>Detail</a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="registerLeadershipModal" tabindex="-1" aria-labelledby="registerLeadershipModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="registerLeadershipModalLabel">Register New Leadership</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="leadershipForm">
                                    <div class="mb-3">
                                        <label for="studentRegNo" class="form-label">Student Registration Number</label>
                                        <select class="select2">
                                            @foreach($student as $student)
                                                <option value="{{$student->id}}">{{$student->name}}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                    <div class="mb-3">
                                        <label for="studentName" class="form-label">Student Name</label>
                                        <input type="text" class="form-control" id="studentName" name="studentName" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <input type="text" class="form-control" id="role" name="role">
                                    </div>
                                    <div class="mb-3">
                                        <label for="fromDate" class="form-label">From</label>
                                        <input type="date" class="form-control" id="fromDate" name="from">
                                    </div>
                                    <div class="mb-3">
                                        <label for="toDate" class="form-label">To</label>
                                        <input type="date" class="form-control" id="toDate" name="to">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <input type="text" class="form-control" id="status" name="status">
                                    </div>
                                    <div class="mb-3">
                                        <label for="remarks" class="form-label">Remarks</label>
                                        <input type="text" class="form-control" id="remarks" name="remarks">
                                    </div>
                                    <div class="mb-3">
                                        <label for="warning" class="form-label">Warning</label>
                                        <input type="text" class="form-control" id="warning" name="warning">
                                    </div>
                                    <div class="mb-3">
                                        <label for="disciplined" class="form-label">Disciplined</label>
                                        <input type="text" class="form-control" id="disciplined" name="disciplined">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <a href="/students" class="btn btn-danger" >BACK</a>
    </div>

    <!-- Recent Sales End -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
       $(document).ready(function ()
       {
           $(".select2").select2();
       })
    </script>
@endsection
