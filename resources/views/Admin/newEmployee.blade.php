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
                <h6 class="mb-0">Register Employee</h6>
            </div>

            <div>
                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    <!-- Personal Information Card -->
                    <div class="card mb-3 border-primary">
                        <div class="card-header bg-primary text-white">
                            Personal Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="full_name" required>
                            </div>
                            <div class="form-group">
                                <label for="dateOfBirth">Date of Birth</label>
                                <input type="date" class="form-control" id="dateOfBirth" name="date_of_birth" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nationality">Nationality</label>
                                <input type="text" class="form-control" id="nationality" name="nationality" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="tel" class="form-control" id="phoneNumber" name="phone_number" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="emergencyContactName">Emergency Contact Name</label>
                                <input type="text" class="form-control" id="emergencyContactName" name="emergency_contact_name" required>
                            </div>
                            <div class="form-group">
                                <label for="emergencyContactPhone">Emergency Contact Phone</label>
                                <input type="tel" class="form-control" id="emergencyContactPhone" name="emergency_contact_phone" required>
                            </div>
                        </div>
                    </div>

                    <!-- Employment Information Card -->
                    <div class="card mb-3 border-success">
                        <div class="card-header bg-success text-white">
                            Employment Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="designation">Designation/Job Title</label>
                                <input type="text" class="form-control" id="designation" name="designation" required>
                            </div>
                            <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" id="department" name="department" required>
                            </div>
                            <div class="form-group">
                                <label for="employmentType">Employment Type</label>
                                <select class="form-control" id="employmentType" name="employment_type" required>
                                    <option value="">Select Type</option>
                                    <option value="Full-time">Full-time</option>
                                    <option value="Part-time">Part-time</option>
                                    <option value="Contractual">Contractual</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dateOfJoining">Date of Joining</label>
                                <input type="date" class="form-control" id="dateOfJoining" name="date_of_joining" required>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary/Wage Details</label>
                                <input type="number" class="form-control" id="salary" name="salary" step="0.01" required>
                            </div>
                        </div>
                    </div>

                    <!-- Educational Qualifications Card -->
                    <div class="card mb-3 border-info">
                        <div class="card-header bg-info text-white">
                            Educational Qualifications
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="highestDegree">Highest Degree/Diploma Obtained</label>
                                <input type="text" class="form-control" id="highestDegree" name="highest_degree" required>
                            </div>
                            <div class="form-group">
                                <label for="institutionName">Name of the Institution</label>
                                <input type="text" class="form-control" id="institutionName" name="institution_name" required>
                            </div>
                            <div class="form-group">
                                <label for="yearOfCompletion">Year of Completion</label>
                                <input type="number" class="form-control" id="yearOfCompletion" name="year_of_completion" required>
                            </div>
                        </div>
                    </div>

                    <!-- Previous Employment Details Card -->
                    <div class="card mb-3 border-warning">
                        <div class="card-header bg-warning text-white">
                            Previous Employment Details (if applicable)
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="previousEmployer">Name of the Previous Employer</label>
                                <input type="text" class="form-control" id="previousEmployer" name="previous_employer">
                            </div>
                            <div class="form-group">
                                <label for="previousDesignation">Designation</label>
                                <input type="text" class="form-control" id="previousDesignation" name="previous_designation">
                            </div>
                            <div class="form-group">
                                <label for="employmentStartDate">Employment Period (Start Date)</label>
                                <input type="date" class="form-control" id="employmentStartDate" name="employment_start_date">
                            </div>
                            <div class="form-group">
                                <label for="employmentEndDate">Employment Period (End Date)</label>
                                <input type="date" class="form-control" id="employmentEndDate" name="employment_end_date">
                            </div>
                        </div>
                    </div>

                    <!-- Identification Documents Card -->
                    <div class="card mb-3 border-secondary">
                        <div class="card-header bg-secondary text-white">
                            Identification Documents
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="governmentId">Government-issued ID (National ID, Passport, etc.)</label>
                                <input type="text" class="form-control" id="governmentId" name="government_id" required>
                            </div>
                            <div class="form-group">
                                <label for="socialSecurityNumber">Social Security Number or Equivalent</label>
                                <input type="text" class="form-control" id="socialSecurityNumber" name="social_security_number" required>
                            </div>
                        </div>
                    </div>

                    <!-- Background Check Information Card -->
                    <div class="card mb-3 border-danger">
                        <div class="card-header bg-danger text-white">
                            Background Check Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="criminalRecordCheck">Criminal Record Check</label>
                                <select class="form-control" id="criminalRecordCheck" name="criminal_record_check" required>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="referenceContactName">Reference Contact Name</label>
                                <input type="text" class="form-control" id="referenceContactName" name="reference_contact_name">
                            </div>
                            <div class="form-group">
                                <label for="referenceContactPhone">Reference Contact Phone</label>
                                <input type="tel" class="form-control" id="referenceContactPhone" name="reference_contact_phone">
                            </div>
                        </div>
                    </div>

                    <!-- Banking Information Card -->
                    <div class="card mb-3 border-dark">
                        <div class="card-header bg-dark text-white">
                            Banking Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="bankAccountNumber">Bank Account Number</label>
                                <input type="text" class="form-control" id="bankAccountNumber" name="bank_account_number" required>
                            </div>
                            <div class="form-group">
                                <label for="bankName">Bank Name</label>
                                <input type="text" class="form-control" id="bankName" name="bank_name" required>
                            </div>
                            <div class="form-group">
                                <label for="branchName">Branch Name</label>
                                <input type="text" class="form-control" id="branchName" name="branch_name" required>
                            </div>
                            <div class="form-group">
                                <label for="paymentMethod">Payment Method</label>
                                <select class="form-control" id="paymentMethod" name="payment_method" required>
                                    <option value="Direct Deposit">Direct Deposit</option>
                                    <option value="Check">Check</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Health Information Card -->
                    <div class="card mb-3 border-info">
                        <div class="card-header bg-info text-white">
                            Health Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="medicalHistory">Medical History (if required)</label>
                                <textarea class="form-control" id="medicalHistory" name="medical_history" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="disabilityStatus">Disability Status (if applicable)</label>
                                <input type="text" class="form-control" id="disabilityStatus" name="disability_status">
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information Card -->
                    <div class="card mb-3 border-primary">
                        <div class="card-header bg-primary text-white">
                            Additional Information
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="skillsCertifications">Skills and Certifications</label>
                                <textarea class="form-control" id="skillsCertifications" name="skills_certifications" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="languageProficiency">Language Proficiency</label>
                                <input type="text" class="form-control" id="languageProficiency" name="language_proficiency">
                            </div>
                            <div class="form-group">
                                <label for="photographPath">Photograph</label>
                                <input type="file" class="form-control-file" id="photographPath" name="photograph_path">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
