@extends('Admin.app')

@section('content')

    <style>
        /* Custom CSS for fancy form styling */

        /* Label styling */
        label {
            float: left; /* Align labels to the left */
            margin-bottom: 0.5rem; /* Add spacing between labels */
        }

        /* Input field styling */
        .form-control {
            background-color: #f8f9fa; /* Set background color */
            color: #495057; /* Set text color */
            border-color: #ced4da; /* Set border color */
        }

        /* Adjust input field margin to create space between label and input field */
        .form-group {
            margin-bottom: 1.5rem; /* Add space between form groups */
        }

        /* Additional styling for radio buttons */
        .form-check-input {
            margin-top: 0.2rem; /* Adjust radio button alignment */
        }
        /* Fancy color effect on focus */
        .form-control:focus {
            background-color: #e9ecef; /* Set fancy background color on focus */
            border-color: #80bdff; /* Set fancy border color on focus */
        }

    </style>

    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Register students</h6>
            </div>

            <div >
                <form id="studentForm" action="{{ route('RegisterStudents') }}" method="POST" class="registration-form">
                    @csrf
                    <!-- Personal Information Card -->
                    <div class="card mb-3 border-primary">
                        <div class="card-header bg-primary text-white">
                            Personal Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" name="student_name" id="fullName" required>
                                @error('student_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Form</label>

                                <select id="form" name="form" class="form-control" required>
                                    <option value="form 1">Form 1</option>
                                    <option value="form 2">Form 2</option>
                                    <option value="form 3">Form 3</option>
                                    <option value="form 4">Form 4</option>
                                </select>

                                @error('form')
                                <span class="invalid-feedback">{{ $form }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="term">Term:</label>
                                <select id="term" name="term" class="form-control" required disabled>
                                    <option value="" selected>Select a Form first</option>
                                </select>
                                @error('term')
                                <span class="invalid-feedback">{{ $term }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="class">Class:</label>
                                <select id="class" name="class" class="form-control" required disabled>
                                    <option value="" selected>Select a Form first</option>
                                </select>

                                @error('class')
                                <span class="invalid-feedback">{{ $class }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Nemis or BirthCertificate</label>
                                <input type="number" class="form-control" id="phoneNumber" name="birthCertOrNemis" required>

                                @error('birthCertOrNemis')
                                <span class="invalid-feedback">{{ $birthCertOrNemis }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Home County</label>
                                <select id="counties" class="form-control" name="address" class="form-control" required>
                                    <option value="">Select County</option>
                                    <option value="Mombasa">Mombasa</option>
                                    <option value="Kwale">Kwale</option>
                                    <option value="Kilifi">Kilifi</option>
                                    <option value="Tana River">Tana River</option>
                                    <option value="Lamu">Lamu</option>
                                    <option value="Taita–Taveta">Taita–Taveta</option>
                                    <option value="Garissa">Garissa</option>
                                    <option value="Wajir">Wajir</option>
                                    <option value="Mandera">Mandera</option>
                                    <option value="Marsabit">Marsabit</option>
                                    <option value="Isiolo">Isiolo</option>
                                    <option value="Meru">Meru</option>
                                    <option value="Tharaka-Nithi">Tharaka-Nithi</option>
                                    <option value="Embu">Embu</option>
                                    <option value="Kitui">Kitui</option>
                                    <option value="Machakos">Machakos</option>
                                    <option value="Makueni">Makueni</option>
                                    <option value="Nyandarua">Nyandarua</option>
                                    <option value="Nyeri">Nyeri</option>
                                    <option value="Kirinyaga">Kirinyaga</option>
                                    <option value="Murang'a">Murang'a</option>
                                    <option value="Kiambu">Kiambu</option>
                                    <option value="Turkana">Turkana</option>
                                    <option value="West Pokot">West Pokot</option>
                                    <option value="Samburu">Samburu</option>
                                    <option value="Trans-Nzoia">Trans-Nzoia</option>
                                    <option value="Uasin Gishu">Uasin Gishu</option>
                                    <option value="Elgeyo-Marakwet">Elgeyo-Marakwet</option>
                                    <option value="Nandi">Nandi</option>
                                    <option value="Baringo">Baringo</option>
                                    <option value="Laikipia">Laikipia</option>
                                    <option value="Nakuru">Nakuru</option>
                                    <option value="Narok">Narok</option>
                                    <option value="Kajiado">Kajiado</option>
                                    <option value="Kericho">Kericho</option>
                                    <option value="Bomet">Bomet</option>
                                    <option value="Kakamega">Kakamega</option>
                                    <option value="Vihiga">Vihiga</option>
                                    <option value="Bungoma">Bungoma</option>
                                    <option value="Busia">Busia</option>
                                    <option value="Siaya">Siaya</option>
                                    <option value="Kisumu">Kisumu</option>
                                    <option value="Homa Bay">Homa Bay</option>
                                    <option value="Migori">Migori</option>
                                    <option value="Kisii">Kisii</option>
                                    <option value="Nyamira">Nyamira</option>
                                    <option value="Nairobi">Nairobi</option>
                                </select>

                                @error('address')
                                <span class="invalid-feedback">{{ $address }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" name="date_of_birth" id="dob" required>

                                @error('date_of_birth')
                                <span class="invalid-feedback">{{ $date_of_birth }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>

                                @error('gender')
                                <span class="invalid-feedback">{{ $gender }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Employment Information Card -->
                    <div class="card mb-3 border-success">
                        <div class="card-header bg-success text-white">
                            KCPE Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="employeeId">KCPE Marks</label>
                                <input type="number" name="kcpe_marks" class="form-control" id="employeeId" required>
                            </div>
                            <div class="form-group">
                                <label for="jobTitle">KCPE Year</label>
                                <input type="number" class="form-control" name="kcpe_year" id="jobTitle" required>
                            </div>
                        </div>
                    </div>

                    <!-- Educational Background Card -->
                    <div class="card mb-3 border-info">
                        <div class="card-header bg-info text-white">
                            Parent/ Guardian Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="degrees">Parent/Guardian Name</label>
                                <input type="text" class="form-control" name="parent_name" id="degrees" required>
                            </div>
                            <div class="form-group">
                                <label for="institutions">Parent/Guardian Phone</label>
                                <input type="text" class="form-control" name="parent_Phone" id="institutions" required>
                            </div>

                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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


@endsection
