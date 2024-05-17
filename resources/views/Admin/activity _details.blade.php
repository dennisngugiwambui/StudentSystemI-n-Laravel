@extends('Admin.app')

@section('content')

    <style>
        .container-fluid {
            background: #0dcaf0;
        }
    </style>
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <img src="{{ asset('Admin/img/activity_avatar.jpg') }}" alt="Activity Avatar" class="img-fluid rounded-circle" style="max-width: 100px;">
            <h2 class="mb-0 text-uppercase">{{ $activity->activity_name }}</h2>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <tbody>
                    <tr>
                        <th scope="row" class="text-info">Date</th>
                        <td id="daysRemainingSpan">{{ $activity->date }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-info">Term</th>
                        <td>Term{{ $activity->term }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-info">Classes</th>
                        <td>{{ $activity->classes }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-info">Description</th>
                        <td>{{ $activity->description }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-left">
            <a href="{{ route('activities') }}" class="btn btn-secondary">Go Back</a>
        </div>
    </div>
</div>




<script>
  // Function to calculate days remaining and update the span element
  function updateDaysRemaining() {
    // Get the date string from the span element
    const dateString = "{{ $activity->date }}";

    // Convert the date string to a Date object
    const targetDate = new Date(dateString);

    // Get the current date
    const currentDate = new Date();

    // Calculate the time difference in milliseconds
    const timeDifference = targetDate - currentDate;

    // Calculate the number of days remaining
    const daysRemaining = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

    // Create a message based on the days remaining
    let message = '';
    if (daysRemaining < 0) {
      message = `(${Math.abs(daysRemaining)} days ago)`;
      document.getElementById('daysRemainingSpan').style.color = 'beige';
    } else if (daysRemaining === 0) {
      message = `(today)`;
      document.getElementById('daysRemainingSpan').style.color = 'yellow';
    } else {
      message = `(${daysRemaining} days remaining)`;
      document.getElementById('daysRemainingSpan').style.color = 'yellow';
    }

    // Display the message in the span element
    document.getElementById('daysRemainingSpan').textContent = message;
  }

  // Call the function to initially calculate and display days remaining
  updateDaysRemaining();
</script>


@endsection
