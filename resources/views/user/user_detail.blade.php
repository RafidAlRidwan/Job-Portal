@extends('user.partials.master')
@section('title')
Home
@endsection
@section('main-content')

<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Profile</h3>
                    <p>Total job applied {{ $applicant->jobs->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
<section class="section profile">
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    @if($applicant->image != [] && file_exists($applicant->image['image_thumbnail']))
                    <img src="{{ asset($applicant->image['image_thumbnail']) }}" alt="Profile" class="rounded-circle">
                    @else
                    <img src="{{ asset('images/user.jpg') }}" alt="Profile" class="rounded-circle">
                    @endif
                    <h2>{{ $applicant->name }}</h2>
                    <p>Total job applied {{ $applicant->jobs->count() }}</p>
                </div>
            </div>

        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <div class="pt-2">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Profile Details</h5>
                                <div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label text-dark">Name</div>
                                        <div class="col-lg-9 col-md-8">{{ $applicant ? $applicant->name : '' }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label text-dark">Phone</div>
                                        <div class="col-lg-9 col-md-8">{{ $applicant ? $applicant->phone : '' }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label text-dark">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ $applicant ? $applicant->email : '' }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label text-dark ">CV</div>
                                        <div class="col-lg-9 col-md-8">
                                            @if($applicant->profile)
                                            @if($applicant->profile->cv != '' && file_exists($applicant->profile->cv))
                                            <a target="_blank" href="{{ asset($applicant->profile->cv) }}" download="{{ $applicant->name.' CV' }}" class="dropdown-item">
                                                <i class='bi bi-download'></i> {{ __('Download') }}
                                            </a>
                                            @else
                                            N/A
                                            @endif
                                            @else
                                            N/A
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="mt-3">

                            <!-- Profile Edit Form -->

                            <div class="row mb-3">
                                <h5>Applied Jobs</h5>
                                <table class="table table-responsive table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Thumb</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Job Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applicant->jobs as $key => $job)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>
                                                @if ($job->thumbnail != [] && file_exists($job->thumbnail['image_thumbnail']))
                                                <img src="{{ asset($job->thumbnail['image_thumbnail']) }}" alt="{{ $job->title }}" class="rounded">
                                                @else
                                                <img src="{{ asset('images/default-40x40.png') }}" alt="{{ $job->title }}" class="mr-3 rounded">
                                                @endif
                                            </td>
                                            <td> {{ $job->title }}</td>
                                            <td>{{ @$job->jobType->title }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End Bordered Tabs -->
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
