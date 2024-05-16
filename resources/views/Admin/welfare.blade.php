@extends('Admin.app')

@section('content')

<div class="container-fluid pt-4 px-4">
    <!-- Sale & Revenue Start -->
    <div class="row g-4">
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <a href="{{ route('leaveout') }}" style="text-decoration: none; color: inherit;">
                <div class="card bg-secondary h-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <i class="fas fa-chalkboard fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">LEAVEOUT</p>
                            
                        </div>
                    </div>
                </div>
            </a>
        </div>        
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="card bg-secondary h-100">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <i class="fas fa-hospital fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Hospital Permission</p>
                        <h6 class="mb-0"></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="card bg-secondary h-100">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <i class="fas fa-file-contract fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Contract</p>
                        <h6 class="mb-0"></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="card bg-secondary h-100">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <i class="fas fa-gavel fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Punishment</p>
                        <h6 class="mb-0"></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="card bg-secondary h-100">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <i class="fas fa-user-times fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Suspension</p>
                        <h6 class="mb-0"></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->
</div>

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">WELFARE DEPARTMENT</h6>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive"></div>
    </div>
</div>

@endsection
