@extends('Admin.app')

@section('content')

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Register students</h6>
        </div>
        <form id="studentForm" action="{{ route('RegisterStudents') }}" method="POST" class="registration-form">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Student Name:</label>
                        <input type="text" id="name" name="student_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="form">Form:</label>
                        <select id="form" name="form" class="form-control" required>
                            <option value="form 1">Form 1</option>
                            <option value="form 2">Form 2</option>
                            <option value="form 3">Form 3</option>
                            <option value="form 4">Form 4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birthCertOrNemis">Birth Cert / Nemis Number:</label>
                        <input type="text" id="birthCertOrNemis" name="birthCertOrNemis" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="parentPhoneNumber">Parent Phone Number:</label>
                        <input type="text" id="parentPhoneNumber" name="parent_number" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kcpGrade">KCPE Marks:</label>
                        <input type="text" id="kcpGrade" name="kcpe_marks" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kcpYear">KCP Year:</label>
                        <input type="text" id="kcpYear" name="kcpe_year" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="term">Term:</label>
                        <select id="term" name="term" class="form-control" required disabled>
                            <option value="" selected>Select a Form first</option>
                        </select>
                    </div>
                </div>
                
            </div>
            <div class="form-group">
                <label for="class">Class:</label>
                <select id="class" name="class" class="form-control" required disabled>
                    <option value="" selected>Select a Form first</option>
                </select>
            </div>
            <div class="d-flex justify-content-between"> <!-- Use flexbox for alignment -->
                <div>
                    <a type="button" href="/registered_students" class="btn btn-danger">Back</a> <!-- Use type="button" for custom behavior -->
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>


        <script>
            // JavaScript to enable Term and Class dropdowns when a Form is selected
            const formSelect = document.getElementById('form');
            const termSelect = document.getElementById('term');
            const classSelect = document.getElementById('class');

            formSelect.addEventListener('change', () => {
                const selectedForm = formSelect.value;
                termSelect.innerHTML = ''; // Clear previous Term options
                classSelect.innerHTML = ''; // Clear previous Class options

                if (selectedForm !== "") {
                    termSelect.disabled = false;
                    classSelect.disabled = false;

                    for (let i = 1; i <= 3; i++) {
                        const termOption = document.createElement('option');
                        termOption.value = `Term ${i}`;
                        termOption.text = `Term ${i}`;
                        termSelect.appendChild(termOption);
                    }

                    const classOptionEast = document.createElement('option');
                    classOptionEast.value = `${selectedForm} East`;
                    classOptionEast.text = `${selectedForm} East`;

                    const classOptionWest = document.createElement('option');
                    classOptionWest.value = `${selectedForm} West`;
                    classOptionWest.text = `${selectedForm} West`;

                    classSelect.appendChild(classOptionEast);
                    classSelect.appendChild(classOptionWest);
                } else {
                    termSelect.disabled = true;
                    classSelect.disabled = true;

                    termSelect.innerHTML = '<option value="" selected>Select a Form first</option>';
                    classSelect.innerHTML = '<option value="" selected>Select a Form first</option>';
                }
            });
        </script>
    </div>
</div>
<!-- Recent Sales End -->

<!-- Add CSS Styles -->
<style>
    .registration-form {
        max-width: 600px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
    }
</style>

@endsection
