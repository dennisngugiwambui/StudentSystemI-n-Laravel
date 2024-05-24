@extends('Admin.app')

@section('content')
    <!-- Custom Styles -->
    <style>
        .employee_details{
            background: #4DC7A0;
        }
        .profile-header {
            position: relative;
            color: white;
            padding: 0;
        }
        .cover-image {
            width: 100%;
            height: 300px;
            background: url('https://www.svgrepo.com/show/384674/account-avatar-profile-user-11.svg') no-repeat center center;
            background-size: cover;
        }
        .profile-details {
            position: absolute;
            bottom: -75px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }
        .profile-details img {
            border: 5px solid #fff;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        .profile-details h2 {
            font-weight: bold;
            margin-top: 1rem;
            color: #333;
        }
        .profile-details p {
            font-size: 1.2rem;
            color: #666;
        }
        .container {
            margin-top: 100px;
        }
        .content-section {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        .content-section h3 {
            border-bottom: 2px solid #a777e3;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            color: #6e8efb;
        }
        .list-group-item {
            border: none;
            border-left: 5px solid #a777e3;
            margin-bottom: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }
        .list-group-item strong {
            color: #a777e3;
        }
    </style>

    <div class="employee_details">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="cover-image"></div>
            <div class="profile-details">
                <img src="https://www.svgrepo.com/show/384674/account-avatar-profile-user-11.svg" alt="Profile Image" class="img-fluid mb-3">
                <h2>{{ $employee->full_name }}</h2>
                {{--            <p>{{ $employee->designation }} - {{ $employee->department }}</p>--}}
                {{--            <p>Employee ID: {{ $employee->unique_id }}</p>--}}
            </div>
        </div>

        <!-- Profile Details -->
        <div class="container">
            <div class="row">
                <!-- Personal Information -->
                <div class="col-md-6">
                    <div class="content-section">
                        <h3>Personal Information</h3>
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
                </div>

                <!-- Employment Information -->
                <div class="col-md-6">
                    <div class="content-section">
                        <h3>Employment Information</h3>
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
            </div>

            <div class="row">
                <!-- Education Information -->
                <div class="col-md-6">
                    <div class="content-section">
                        <h3>Education Information</h3>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Highest Degree:</strong> {{ $employee->highest_degree }}</li>
                            <li class="list-group-item"><strong>Institution Name:</strong> {{ $employee->institution_name }}</li>
                            <li class="list-group-item"><strong>Year of Completion:</strong> {{ $employee->year_of_completion }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Bank Information -->
                <div class="col-md-6">
                    <div class="content-section">
                        <h3>Bank Information</h3>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Bank Account Number:</strong> {{ $employee->bank_account_number }}</li>
                            <li class="list-group-item"><strong>Bank Name:</strong> {{ $employee->bank_name }}</li>
                            <li class="list-group-item"><strong>Branch Name:</strong> {{ $employee->branch_name }}</li>
                            <li class="list-group-item"><strong>Payment Method:</strong> {{ $employee->payment_method }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Additional Information -->
                <div class="col-md-12">
                    <div class="content-section">
                        <h3>Additional Information</h3>
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
        </div>
    </div>


@endsection
