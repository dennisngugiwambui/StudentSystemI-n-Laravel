@extends('Admin.app')

@section('content')


<style>
    .container-fluid{
        background: #0dcaf0;
    }
    /* Card Styles */
    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #f8f9fa; /* Light gray background */
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    /* Spacing Styles */
    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem!important;
    }

    /* Background Styles */
    .bg-gray-300 {
        background-color: #e2e8f0; /* Light blue-gray background */
    }

    /* Height Styles */
    .h-100 {
        height: 100%!important;
    }

    /* Box Shadow Styles */
    .shadow-none {
        box-shadow: none!important;
    }

    /* Text Styles */
    h6.mb-0 {
        color: #007bff; /* Blue header text */
    }

    p.text-secondary {
        color: #6c757d; /* Gray text */
    }
    /* Custom CSS for fancy input fields */
    /* Custom CSS for fancy input fields */
    .fancy-input {
        border: 2px solid #007bff; /* Blue border */
        border-radius: 4px;
        padding: 10px;
        font-size: 16px;
        color: #007bff !important; /* Explicitly set text color to blue */
        background-color: #f8f9fa; /* Light gray background */
    }

    /* Style the input fields when they are focused */
    .fancy-input:focus {
        outline: none;
        border-color: #0056b3; /* Darker blue border on focus */
        box-shadow: 0 0 5px #0056b3; /* Box shadow on focus */
    }


</style>

<!-- Profile Header -->
<div class="profile-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Profile Picture" class="rounded-circle profile-picture" width="150">
                        <p class="text-secondary mb-1">{{$student->student_name}}</p>
                        <p class="text-muted font-size-sm">Since {{$student->created_at}}</p>

                        <button class="btn btn-outline-primary">Message</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $student->student_name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">KCPE MARKS</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $student->kcpe_marks }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $student->parent_phone }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Form</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $student->form }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Term</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $student->term }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nemis</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $student->birth_cert_or_nemis }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Promote</a>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Details</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('promote_student', $student->id) }}" method="POST">
                                        @csrf

                                        <!-- Form Group for Form -->
                                        <div class="mb-3">
                                            <label for="form" class="form-label">Form</label>
                                            <select class="form-select" id="form" name="form">
                                                <option value="Form 1" {{ $student->form === 'Form 1' ? 'selected' : '' }}>Form 1</option>
                                                <option value="Form 2" {{ $student->form === 'Form 2' ? 'selected' : '' }}>Form 2</option>
                                                <option value="Form 3" {{ $student->form === 'Form 3' ? 'selected' : '' }}>Form 3</option>
                                                <option value="Form 4" {{ $student->form === 'Form 4' ? 'selected' : '' }}>Form 4</option>
                                            </select>
                                        </div>

                                        <!-- Form Group for Term -->
                                        <div class="mb-3">
                                            <label for="term" class="form-label">Term</label>
                                            <select class="form-select" id="term" name="term">
                                                <option value="Term 1" {{ $student->term === 'Term 1' ? 'selected' : '' }}>Term 1</option>
                                                <option value="Term 2" {{ $student->term === 'Term 2' ? 'selected' : '' }}>Term 2</option>
                                                <option value="Term 3" {{ $student->term === 'Term 3' ? 'selected' : '' }}>Term 3</option>
                                            </select>
                                        </div>
                                    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Skills and Leadership Section -->
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 style="color: #245284;" class="card-title">Skills and Leadership</h5>
                <a class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#addSkills">Add</a>
            </div>

            <!-- Modal for adding new skills -->
            <!-- Modal for adding new skills -->
<!-- Modal for adding new skills -->
            <div class="modal fade" id="addSkills" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Adding Skills</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('adding_skills', $student->id)}}" method="POST">
                                @csrf

                                <input type="hidden" name="student_id" value="{{ $student->id }}">

                                <div class="mb-3">
                                    <label for="skill_title" class="form-label">Skill Title</label>
                                    <input type="text" class="form-control fancy-input" id="skill_title" name="skill_title" required>
                                </div>

                                <div class="mb-3">
                                    <label for="skill_name" class="form-label">Skill Name</label>
                                    <input type="text" class="form-control fancy-input" id="skill_name" name="skill" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Add your skills and leadership content here -->
            @foreach ($student->skills as $skill)
            <div class="mb-3">
                <h6 class="mb-0">{{ $skill->skill_title }}</h6>
                <p class="text-secondary">{{ $skill->skill }}</p>
            </div>
        @endforeach

        </div>
    </div>
</div>

<!-- School Fees Section -->
<!-- School Fees Section -->
<div class="container mt-4">
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
                <tr style="background-color: #245284; color: white;">
                    <th scope="col">Date</th>
                    <th scope="col">Amount Paid</th>
                    <th scope="col">Term</th>
                    <th scope="col">Balance</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <tr style="background-color: #e2e8f0;">
                    <td>January 15, 2023</td>
                    <td>$500</td>
                    <td>Spring 2023</td>
                    <td>$1,000</td>
                    <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                </tr>
                <tr style="background-color: #d3d8e2;">
                    <td>December 10, 2022</td>
                    <td>$300</td>
                    <td>Fall 2022</td>
                    <td>$1,300</td>
                    <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>


<!-- Grade Section -->
<div class="container mt-4">
    <h5 style="color: #245284;" class="mb-3">Grade Section</h5>

    <!-- Form 1 -->
    <h6 class="mb-2">Form 1</h6>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-3">
            <thead>
                <tr style="background-color: #245284; color: white;">
                    <th scope="col">Subject</th>
                    <th scope="col">Term 1</th>
                    <th scope="col">Term 2</th>
                    <th scope="col">Term 3</th>
                    <th scope="col">Average</th>
                    <th scope="col">Grade</th>
                </tr>
            </thead>
            <tbody>
                <!-- Add rows for subjects in Form 1 -->
                <tr style="background-color: #e2e8f0;">
                    <td>Math</td>
                    <td>85</td>
                    <td>90</td>
                    <td>88</td>
                    <td>87.67</td>
                    <td>A</td>
                </tr>
                <tr style="background-color: #e2e8f0;">
                    <td>Physics</td>
                    <td>85</td>
                    <td>90</td>
                    <td>88</td>
                    <td>87.67</td>
                    <td>A</td>
                </tr>
                <tr style="background-color: #e2e8f0;">
                    <td>Chemistry</td>
                    <td>85</td>
                    <td>90</td>
                    <td>88</td>
                    <td>87.67</td>
                    <td>A</td>
                </tr>
                <tr style="background-color: #e2e8f0;">
                    <td>Kiswahili</td>
                    <td>85</td>
                    <td>90</td>
                    <td>88</td>
                    <td>87.67</td>
                    <td>A</td>
                </tr>
                <tr style="background-color: #e2e8f0;">
                    <td>English</td>
                    <td>85</td>
                    <td>90</td>
                    <td>88</td>
                    <td>87.67</td>
                    <td>A</td>
                </tr>
                <tr style="background-color: #e2e8f0;">
                    <td>CRE</td>
                    <td>85</td>
                    <td>90</td>
                    <td>88</td>
                    <td>87.67</td>
                    <td>A</td>
                </tr>
                <tr style="background-color: #e2e8f0;">
                    <td>Business Studies</td>
                    <td>85</td>
                    <td>90</td>
                    <td>88</td>
                    <td>87.67</td>
                    <td>A</td>
                </tr>
                <tr style="background-color: #e2e8f0;">
                    <td>Geography</td>
                    <td>85</td>
                    <td>90</td>
                    <td>88</td>
                    <td>87.67</td>
                    <td>A</td>
                </tr>
                <!-- Add more rows for other subjects in Form 1 -->
            </tbody>
            <tfoot>
                <tr style="background-color: #84d95f; color: white;">
                    <th>Total</th>
                    <th>85</th>
                    <th>90</th>
                    <th>88</th>
                    <th>90.0</th>
                    <th>A</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Add similar tables for Form 2, Form 3, and Form 4 -->

</div>





<!-- Add the rest of your profile sections below this comment -->

@endsection
