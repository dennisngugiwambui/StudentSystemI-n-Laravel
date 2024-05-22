@extends('Admin.app')

@section('content')

    <style>
        .container-fluid{
            background: #0dcaf0;
        }
        .card{
            background: black;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            padding: 20px;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
        }

        /* Styling for card headers */
        .card-header {
            background: #0dcaf0;
            border-radius: 10px 10px 0 0;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
        }

        /* Styling for card content */
        .card-content {
            padding: 20px;
            font-size: 16px;
            color: #333;
        }

        /* Additional styles for data visualization cards */
        .card-data {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .card-data .icon {
            font-size: 48px;
            color: #0dcaf0;
        }
    </style>


    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <a href="{{ route('registered_students') }}" class="text-decoration-none">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"> </i>
                        <div class="ms-3">
                            <p class="mb-2">Registered</p>
                            <h6 class="mb-0">2932</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-3">
                <a href="{{ route('Punishment') }}" class="text-decoration-none">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Punishment</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-3">
                <a href="{{ route('leadership') }}" class="text-decoration-none">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-area fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Leaderships</p>
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
                <h6 class="mb-0">Recent Salse</h6>
                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Joined</th>
                            <th scope="col">BirthcertOrNemis</th>
                            <th scope="col">Class</th>
                            <th scope="col">Parent Phone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $data)
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>{{$data->student_name}}</td>
                            <td>{{$data->from}}</td>
                            <td>{{$data->birthcertOrNemis}}</td>
                            <td>{{$data->class}}</td>
                            <td>{{$data->parent_phone}}</td>
                            <td><a class="btn btn-sm btn-primary" href="{{ route('student_details', ['unique_id' => $item->unique_id]) }}">Detail</a></td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->



@endsection
