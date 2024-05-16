@extends('Admin.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $("#searchTable").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>



<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Registered students</h6>
            <form action="{{ route('register_students') }}" method="get">
                <button type="submit" class="btn btn-primary">Register Students</button>
            </form>
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
                        <th scope="col">Form</th>
                        <th scope="col">Term</th>
                        <th scope="col">Names</th>
                        <th scope="col">Phone</th>
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
        </div>
    </div>
</div>
<!-- Recent Sales End -->
@endsection
