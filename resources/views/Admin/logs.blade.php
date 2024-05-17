@extends('Admin.app')

@section('content')

    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Login Logs</h6>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">

                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ip Address</th>
                            <th scope="col">Time</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($logs as $log)
                            <tr>
                                <td>{{ $log->id }}</td>
                                <td>{{ $log->name }}</td>
                                <td>{{ $log->phone }}</td>
                                <td>{{ $log->email }}</td>
                                <td>{{ $log->ip_address }}</td>
                                <td>{{ $log->created_at }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->



@endsection
