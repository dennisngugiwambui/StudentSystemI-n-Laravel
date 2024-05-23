@extends('Admin.app')

@section('content')
    <!-- Custom Styles -->
    <style>
        .profile-header {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
            padding: 3rem 0;
        }
        .profile-header img {
            border: 5px solid #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        .profile-header h2 {
            font-weight: bold;
        }
        .profile-header p {
            font-size: 1.2rem;
        }
        .list-group-item {
            border: none;
            border-left: 5px solid #a777e3;
            margin-bottom: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .list-group-item strong {
            color: #a777e3;
        }
        .container {
            margin-top: -50px;
        }
    </style>

    <!-- Profile Header -->
    <div class="profile-header text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <img src="{{ asset($employee->photograph_path) }}" alt="Profile Image" class="rounded-circle img-fluid mb-3" style="width: 150px; height: 150px;">
                </div>
                <div class="col-md-9">
                    <h2>{{ $employee->full_name }}</h2>
                    <p>{{ $employee->designation }} - {{ $employee->department }}</p>
                    <p>Employee ID: {{ $employee->unique_id }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Details -->
    <div class="container mt-5">
        <div class="row">
            <!-- Personal Information -->
            <div class="col-md-6">
                <h3 class="mb-4">Personal Information</h3>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Date of Birth:</strong> {{ $employee->date_of_birth }}</li>
                    <li class="list-group-item"><strong>Gender:</strong> {{ $employee->gender }}</li>
                    <li class="list-group-item"><strong>Nationality:</strong> {{ $employee->nationality }}</li>
                    <li class="list-group-item"><strong>Address:</strong> {{ $employee->address }}</li>
                    <li class="list-group-item"><strong>Phone Number:</strong> {{ $employee->phone_number }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $employee->email }}</li>
                    <li class="list-group-item"><strong>Emergency Contact Name:</strong> {{ $employee->emergency_contact_name }}</li>
                    <li class="list-group-item"><strong>Emergency Contact Phone:</strong> {{ $employee->emergency_contact_phone }}</li>
                </ul>
            </div>

            <!-- Employment Information -->
            <div class="col-md-6">
                <h3 class="mb-4">Employment Information</h3>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Employment Type:</strong> {{ $employee->employment_type }}</li>
                    <li class="list-group-item"><strong>Date of Joining:</strong> {{ $employee->date_of_joining }}</li>
                    <li class="list-group-item"><strong>Salary:</strong> ${{ number_format($employee->salary, 2) }}</li>
                    <li class="list-group-item"><strong>Previous Employer:</strong> {{ $employee->previous_employer ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Previous Designation:</strong> {{ $employee->previous_designation ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Employment Period:</strong> {{ $employee->employment_start_date ? $employee->employment_start_date->format('Y-m-d') . ' to ' . $employee->employment_end_date->format('Y-m-d') : 'N/A' }}</li>
                </ul>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Education Information -->
            <div class="col-md-6">
                <h3 class="mb-4">Education Information</h3>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Highest Degree:</strong> {{ $employee->highest_degree }}</li>
                    <li class="list-group-item"><strong>Institution Name:</strong> {{ $employee->institution_name }}</li>
                    <li class="list-group-item"><strong>Year of Completion:</strong> {{ $employee->year_of_completion }}</li>
                </ul>
            </div>

            <!-- Bank Information -->
            <div class="col-md-6">
                <h3 class="mb-4">Bank Information</h3>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Bank Account Number:</strong> {{ $employee->bank_account_number }}</li>
                    <li class="list-group-item"><strong>Bank Name:</strong> {{ $employee->bank_name }}</li>
                    <li class="list-group-item"><strong>Branch Name:</strong> {{ $employee->branch_name }}</li>
                    <li class="list-group-item"><strong>Payment Method:</strong> {{ $employee->payment_method }}</li>
                </ul>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Additional Information -->
            <div class="col-md-12">
                <h3 class="mb-4">Additional Information</h3>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Government ID:</strong> {{ $employee->government_id }}</li>
                    <li class="list-group-item"><strong>Social Security Number:</strong> {{ $employee->social_security_number }}</li>
                    <li class="list-group-item"><strong>Criminal Record Check:</strong> {{ $employee->criminal_record_check ? 'Yes' : 'No' }}</li>
                    <li class="list-group-item"><strong>Reference Contact Name:</strong> {{ $employee->reference_contact_name ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Reference Contact Phone:</strong> {{ $employee->reference_contact_phone ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Medical History:</strong> {{ $employee->medical_history ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Disability Status:</strong> {{ $employee->disability_status ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Skills & Certifications:</strong> {{ $employee->skills_certifications ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Language Proficiency:</strong> {{ $employee->language_proficiency ?? 'N/A' }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
