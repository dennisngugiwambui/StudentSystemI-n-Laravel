@extends('Admin.app')

@section('content')

<style>
    /* Customize the modal style */
    .modal {
        z-index: 1050; /* Adjust the z-index to ensure it overlays other content */
        display: none;
        overflow: hidden;
        background: rgba(0, 0, 0, 0.5); /* Add a semi-transparent background overlay */
    }

    .modal-dialog {
        margin-top: 10%; /* Adjust the vertical position as needed */
    }

    /* Customize modal header and close button */
    .modal-header {
        background-color: #007bff; /* Change header background color */
        color: #fff; /* Change header text color */
    }
    
    .modal-footer {
        background-color: #007bff; /* Change header background color */
        color: #fff; /* Change header text color */
    }
    input[type="text"],
    input[type="password"],
    input[type="email"],
    input[type="date"],
    select,
    textarea {
        background-color: white;
        color: black;
        /* You can add more styles like padding, border, etc., here */
    }

    /* Default styles */
    input[type="text"],
    select,
    select {
        background-color: white;
        color: black;
    }

    /* Styles when focused */
    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="email"]:focus,
    input[type="date"]:focus,
    select:focus,
    select:focus {
        background-color: white;
        color: black;
    }

    /* Add more custom styling as needed */
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function(){
      $("#searchTable").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">All Activities</h6>
           <!-- Button trigger modal -->
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
             Add Activities</button>

               <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Activities</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('admin_activities') }}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Activity</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="name" id="inputPassword">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">date</label>
                            <div class="col-sm-10">
                              <input type="date" name="date" class="form-control" id="inputPassword">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Term</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="term" id="floatingSelectGrid">
                                   
                                    <option value="1">Term 1</option>
                                    <option value="2">Term 2</option>
                                    <option value="3">Term 3</option>
                                </select>
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="year" class="col-sm-2 col-form-label">Year</label>
                            <div class="col-sm-10">
                                <input type="text" name="year" id="year" class="form-control" readonly>
                            </div>
                        </div>
                          <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Classes</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="classes" id="floatingSelectGrid">
                                    <option value="all classes">all classes</option>
                                    <option value="form1">Form 1</option>
                                    <option value="form2">Form 2</option>
                                    <option value="form3">Form 3</option>
                                    <option value="form4">Form 4</option>
                                    <option value="form1,2,3">Form 1,2,3</option>
                                    <option value="form1,2">Form 1,2</option>
                                    <option value="form2,3">Form 2,3</option>
                                    <option value="form3,4">Form 3,4</option>
                                </select>
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Explain</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="description" id="inputPassword" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Activity</button>
                            </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>

        </div>
        <div class="table-responsive">
            <div class="mb-3 text-white"> 
                <input type="text" id="searchTable" class="form-control bg-dark border-0" style="color: #fff;" placeholder="Search">
            </div>
           
            <table id="activityTable" class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">ID</th>
                        <th scope="col">Activity</th>
                        <th scope="col">Date</th>
                        <th scope="col">Term</th>
                        <th scope="col">Classes</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                        <th scope="col">Complete</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($data as $item )
                    <tr>
                       <td><input class="form-check-input" type="checkbox"></td>
                       <td>{{ $item->id }}</td>
                       <td>{{ $item->activity_name }}</td>
                       <td>{{ $item->date }}</td>
                       <td>Term{{ $item->term }}</td>
                       <td>{{ $item->classes }}</td>
                       <td>{{ $item->description }}</td>
                       <td> 
                        @if ($item->status == 'unverified')
                        <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#verifyModel_{{ $item->id }}">
                            Verify
                        </a>
                        @else
                        <span style="background-color: blue; color: white; padding: 4px 8px; border-radius: 4px;">Verified</span>
                        @endif
                       </td>
                       <td><a class="btn btn-sm btn-primary" href="{{ route('activity_details', ['id' => $item->id]) }}">Detail</a></td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="verifyModel_{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="verifyModel_{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Verify activity {{ $item->id }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('verify_status', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        <div class="mb-3 row">
                                            <h1 class="col-form-label" style="color: black">Are you sure you want to verify this activity?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Verify</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Ensure that the modal is displayed when the button is clicked
    $(document).ready(function () {
        $('#exampleModal').on('show.bs.modal', function (e) {
            // Handle modal display behavior here, if needed
        });
    });

    // Get the current year
    var currentYear = new Date().getFullYear();

    // Set the value of the "Year" input field
    document.getElementById("year").value = currentYear;

    // Initialize DataTable with options
    const table = $('#activityTable').DataTable({
        "paging": false, // Remove pagination if needed
        "searching": false, // Remove DataTable search input, we will use our own
    });

    // Apply custom search to DataTable
    $('#searchTable').on('keyup', function () {
        table.search(this.value).draw();
    });

    // Apply filtering based on the selected term
    $('#termFilter').on('change', function () {
        const term = this.value;
        table.column(4).search(term).draw(); // Assuming 'Term' is in the fifth column
    });
</script>

@endsection
