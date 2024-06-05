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

        /* Select2 styling */
        .select2-container .select2-selection--single {
            height: 38px; /* Match the form-control height */
            background-color: #f8f9fa; /* Match background color */
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #495057; /* Match text color */
        }
    </style>

    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">New Communications</h6>
            </div>

            <div>
                <form action="{{route('new_Communication')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Recipient Group Card -->
                    <div class="card mb-3 border-primary">
                        <div class="card-header bg-primary text-white">
                            Recipient Group
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="recipientGroup">Recipient Group</label>
                                <select class="form-control select2" id="recipientGroup" name="recipient_group[]" multiple="multiple" required>
                                    <option value="Parents">All Parents</option>
                                    <option value="Teachers">All Teachers</option>
                                    <option value="Non Teaching Staff">Non Teaching Staff</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="formGroup">Form to include</label>
                                <select class="form-control select2" id="formGroup" name="form_group[]" multiple="multiple" required>
                                    <option value="form 1">Form 1</option>
                                    <option value="form 2">Form 2</option>
                                    <option value="form 3">Form 3</option>
                                    <option value="form 4">Form 4</option>
                                </select
                            </div>

                            <div class="form-group">
                                <label for="eventName">Event Name</label>
                                <select class="form-control select2" id="eventName" name="event_name" required>
                                    <option value="school opening">School Opening</option>
                                    <option value="school closing">School Closing</option>
                                    <option value="mid term">Mid Term</option>
                                    <option value="student clinic">Student Clinic</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group" id="otherEventNameDiv" style="display: none;">
                                <label for="otherEventName">Other Event Name</label>
                                <input type="text" class="form-control" id="otherEventName" name="other_event_name">
                            </div>

                            <div class="form-group">
                                <label for="eventDate">Event Date</label>
                                <input type="date" class="form-control" id="eventDate" name="event_date" required>
                            </div>

                            <div class="form-group">
                                <label for="eventTime">Event Time</label>
                                <input type="time" class="form-control" id="eventTime" name="event_time" required>
                            </div>
                        </div>
                    </div>

                    <!-- Message Details Card -->
                    <div class="card mb-3 border-success">
                        <div class="card-header bg-success text-white">
                            Message
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="messageContent">Additional Message</label>
                                <textarea class="form-control" id="messageContent" name="message_content" rows="6"></textarea>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            $('#eventName').change(function() {
                if ($(this).val() === 'other') {
                    $('#otherEventNameDiv').show();
                    $('#otherEventName').attr('required', true);
                } else {
                    $('#otherEventNameDiv').hide();
                    $('#otherEventName').attr('required', false);
                }
            });
        });
    </script>
@endsection
