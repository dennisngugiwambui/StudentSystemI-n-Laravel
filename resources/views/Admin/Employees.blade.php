@extends('Admin.app')

@section('content')



    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">




        </div>
    </div>
    <!-- Sale & Revenue End -->




    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">EMPLOYEES DATA</h6>
                <a href="" class="btn btn-danger"> <i class="fa fa-plus"></i> Add New</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                    <tr class="text-white">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Joined</th>
                        <th scope="col">ID</th>
                        <th scope="col">Role</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    @foreach($data as $data)--}}
{{--                        <tr>--}}
{{--                            <td><input class="form-check-input" type="checkbox"></td>--}}
{{--                            <td>{{$data->student_name}}</td>--}}
{{--                            <td>{{$data->from}}</td>--}}
{{--                            <td>{{$data->birthcertOrNemis}}</td>--}}
{{--                            <td>{{$data->class}}</td>--}}
{{--                            <td>{{$data->parent_phone}}</td>--}}
{{--                            <td><a class="btn btn-sm btn-primary" href="/registerd_students">Detail</a></td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->



@endsection
