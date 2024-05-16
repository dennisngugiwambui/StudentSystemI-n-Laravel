@extends('Admin.app')

@section('content')

<!-- Include bootstrap-datepicker CSS and JavaScript -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Punishment Records</h6>
        </div>
        <div class="table-responsive">
            <!-- Top Navigation Bars -->
            <div class="d-flex justify-content-between">
                <div class="p-2">
                    <button type="button" class="btn btn-primary" id="addPunishmentButton">
                        <i class="bi bi-plus"></i> Add Punishment
                    </button>
                </div>
                <div class="p-2">
                    <a href="" class="btn btn-success">
                        <i class="bi bi-journal"></i> Punishment Reports
                    </a>
                </div>
                <div class="p-2">
                    <a href="" class="btn btn-info">
                        <i class="bi bi-people"></i> All Students
                    </a>
                </div>
            </div>

            <!-- Punishment Form (Initially Hidden) -->
            <div id="punishmentForm" style="display: none;">
                <form method="POST" action="{{ route('add_punisment') }} ">
                    @csrf
                    <div class="mb-3 position-relative">
                        <label for="student_name" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="student_name" name="student_name" required>
                        <div id="studentDropdown" class="dropdown-menu position-absolute" style="display: none;">
                            <ul class="list-group" style="list-style: none; margin: 0; padding: 0;"></ul>
                        </div>
                    </div>                    
                    <div class="mb-3">
                        <label for="form" class="form-label">Form</label>
                        <input type="text" class="form-control" id="form" name="form" required>
                    </div>
                    <div class="mb-3">
                        <label for="term" class="form-label">Detail</label>
                        <textarea type="text" class="form-control is-invalid" id="reason" name="reason" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="to" class="form-label">To</label>
                        <input type="date" name="to" id="">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    const studentNames = {!! json_encode($data->pluck('student_name')->toArray()) !!}; // Get student names from the server

    document.getElementById('addPunishmentButton').addEventListener('click', function () {
        document.getElementById('punishmentForm').style.display = 'block';
    });

    const studentNameInput = document.getElementById('student_name');
    const studentDropdown = document.getElementById('studentDropdown');

    studentNameInput.addEventListener('input', function () {
        const searchText = this.value.toLowerCase();
        const filteredNames = studentNames.filter(name => name.toLowerCase().includes(searchText));

        const dropdownMenu = document.querySelector('.dropdown-menu');
        dropdownMenu.innerHTML = '';

        if (filteredNames.length > 0) {
            filteredNames.forEach(name => {
                const listItem = document.createElement('li');
                listItem.innerHTML = `<a class="dropdown-item">${name}</a>`;
                listItem.addEventListener('click', function () {
                    studentNameInput.value = name;
                    // Fetch and populate form and term fields based on the selected student's details
                    // Implement this part with AJAX based on your server route
                    // For now, you can manually populate the form and term fields
                    document.getElementById('form').value = 'Selected Form'; // Replace with actual form value
                    document.getElementById('term').value = 'Selected Term'; // Replace with actual term value
                    dropdownMenu.innerHTML = '';
                });
                dropdownMenu.appendChild(listItem);
            });
            dropdownMenu.style.display = 'block';
        } else {
            dropdownMenu.style.display = 'none';
        }
    });

    // Close dropdown when clicking outside
    window.addEventListener('click', function (e) {
        if (!studentDropdown.contains(e.target)) {
            studentDropdown.style.display = 'none';
        }
    });
</script>


<script>
    // Initialize date picker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd', // Specify the desired date format
        autoclose: true,      // Close the date picker when a date is selected
    });

</script>

@endsection
