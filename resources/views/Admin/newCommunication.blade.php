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

        /* Card styling */
        .card {
            border-radius: 0.5rem; /* Add rounded corners */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Add shadow for depth */
        }

        .card-header {
            font-size: 1.25rem; /* Increase header font size */
        }

        /* Fancy button styling */
        .btn-fancy {
            background-color: #007bff; /* Set button color */
            border-color: #007bff; /* Set button border color */
            color: white; /* Set text color */
        }

        .btn-fancy:hover {
            background-color: #0056b3; /* Change color on hover */
            border-color: #004085; /* Change border color on hover */
        }
    </style>

    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Communications to Parents</h6>
            </div>

            <div>
                <form action="{{ route('parentCommunications.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Recipient Group Card -->
                    <div class="card mb-3 border-primary">
                        <div class="card-header bg-primary text-white">
                            Recipient Group
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="allParents" name="recipient_group[]" value="All Parents">
                                    <label class="form-check-label" for="allParents">
                                        All Parents
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="allTeachers" name="recipient_group[]" value="All Teachers">
                                    <label class="form-check-label" for="allTeachers">
                                        All Teachers
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="specificGroup" name="recipient_group[]" value="Specific Group">
                                    <label class="form-check-label" for="specificGroup">
                                        Specific Group (Enter details below)
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="groupName">Group Name</label>
                                <input type="text" class="form-control" id="groupName" name="group_name">
                            </div>
                            <div class="form-group">
                                <label for="gradeLevels">Grade Level(s)</label>
                                <input type="text" class="form-control" id="gradeLevels" name="grade_levels">
                            </div>
                            <div class="form-group">
                                <label for="classSections">Class Section(s)</label>
                                <input type="text" class="form-control" id="classSections" name="class_sections">
                            </div>
                            <div class="form-group">
                                <label for="otherCriteria">Other Criteria</label>
                                <input type="text" class="form-control" id="otherCriteria" name="other_criteria">
                            </div>
                        </div>
                    </div>

                    <!-- Message Details Card -->
                    <div class="card mb-3 border-success">
                        <div class="card-header bg-success text-white">
                            Message Details
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="subjectTitle">Subject/Title</label>
                                <input type="text" class="form-control" id="subjectTitle" name="subject_title" required>
                            </div>
                            <div class="form-group">
                                <label for="messageContent">Message</label>
                                <textarea class="form-control" id="messageContent" name="message_content" rows="6" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="fileAttachment">Attach File(s) (Optional)</label>
                                <input type="file" class="form-control-file" id="fileAttachment" name="file_attachment[]" multiple>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Preferences Card -->
                    <div class="card mb-3 border-warning">
                        <div class="card-header bg-warning text-white">
                            Notification Preferences
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Send Email Notifications</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="send_email" id="sendEmailYes" value="Yes" required>
                                    <label class="form-check-label" for="sendEmailYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="send_email" id="sendEmailNo" value="No">
                                    <label class="form-check-label" for="sendEmailNo">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Send SMS Text Notifications</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="send_sms" id="sendSmsYes" value="Yes" required>
                                    <label class="form-check-label" for="sendSmsYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="send_sms" id="sendSmsNo" value="No">
                                    <label class="form-check-label" for="sendSmsNo">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-fancy btn-block">Send Communication</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
