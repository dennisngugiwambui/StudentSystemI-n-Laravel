@extends('Admin.app')

@section('content')

<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- Your sales widgets go here -->
    </div>
</div>
<!-- Sale & Revenue End -->

<!-- Profile Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-white text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">{{ auth()->user()->name }} Profile</h6>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">
                Edit Profile
            </button>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="avatar mx-auto mb-4">
                    <img src="{{ asset('Admin/img/activity_avatar.jpg') }}" alt="User Avatar" class="img-fluid rounded-circle" width="200">
                </div>
            </div>
            <div class="col-md-8">
                <div class="profile-info">
                    <div class="card bg-light"> <!-- Use a faded background color -->
                        <div class="card-body">
                            <h5 class="card-title">User Information</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong class="title">Name:</strong> {{ auth()->user()->name }}
                                </li>
                                <li class="list-group-item">
                                    <strong class="title">Phone:</strong> {{ auth()->user()->phone }}
                                </li>
                                <li class="list-group-item">
                                    <strong class="title">Email:</strong> {{ auth()->user()->email }}
                                </li>
                                <li class="list-group-item">
                                    <strong class="title">User Type:</strong> {{ auth()->user()->usertype }}
                                </li>
                                <li class="list-group-item">
                                    <strong class="title">Status:</strong> {{ auth()->user()->status }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
<!-- Profile End -->

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Add your edit profile form here -->
        </div>
    </div>
</div>

@endsection
