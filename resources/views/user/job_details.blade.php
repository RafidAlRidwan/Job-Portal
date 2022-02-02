@extends('user.partials.master')
@section('title')
User Home
@endsection
@section('main-content')
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>{{$jobDetails['job_type']}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="job_details_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="job_details_header">
                    <div class="single_jobs white-bg d-flex justify-content-between">
                        <div class="jobs_left d-flex align-items-center">
                            <div class="thumb">
                                <img src={{$jobDetails['thumbnail']}} height="80">
                            </div>
                            <div class="jobs_conetent">
                                <a>
                                    <h4>{{$jobDetails['job_title']}}</h4>
                                </a>
                                <div class="links_locat d-flex align-items-center">
                                    <div class="location">
                                        <p> <i class="fa fa-map-marker"></i>{{$jobDetails['job_location']}}</p>
                                    </div>
                                    <div class="location">
                                        <p> <i class="fa fa-clock-o"></i> Full-time</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="jobs_right">
                            <div class="apply_now">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="descript_wrap white-bg">
                    <div class="single_wrap">
                        <h4>Job description</h4>
                        {!! $jobDetails['description'] !!}
                    </div>
                </div>
                <div class="apply_job_form white-bg">
                    <h4>Apply for the job</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="submit_btn">
                                <a href={{url('user/apply-job/'.$jobDetails['id'])}}><button class="boxed-btn3 w-100">Apply Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="job_sumary">
                    <div class="summery_header">
                        <h3>Job Summery</h3>
                    </div>
                    @php
                    $date = date("d M Y",strtotime($jobDetails['dead_line']));
                    @endphp
                    <div class="job_content">
                        <ul>
                            <li>Deadline: <span>{{$date}}</span></li>
                            <li>Vacancy: <span>Not Specified</span></li>
                            <li>Salary: <span>Negotiable</span></li>
                            <li>Location: <span>{{$jobDetails['job_location']}}</span></li>
                            <li>Job Nature: <span> Full-time</span></li>
                        </ul>
                    </div>
                </div>
                <div class="share_wrap d-flex">
                    <span>Share at:</span>
                    <ul>
                        <li><a href="#"> <i class="fa fa-facebook"></i></a> </li>
                        <li><a href="#"> <i class="fa fa-google-plus"></i></a> </li>
                        <li><a href="#"> <i class="fa fa-twitter"></i></a> </li>
                        <li><a href="#"> <i class="fa fa-envelope"></i></a> </li>
                    </ul>
                </div>
                <div class="job_location_wrap">
                    <div class="job_lok_inner">
                        <div id="map" style="height: 200px;"></div>
                        <script>
                            function initMap() {
                                var uluru = {
                                    lat: -25.363,
                                    lng: 131.044
                                };
                                var grayStyles = [{
                                        featureType: "all",
                                        stylers: [{
                                                saturation: -90
                                            },
                                            {
                                                lightness: 50
                                            }
                                        ]
                                    },
                                    {
                                        elementType: 'labels.text.fill',
                                        stylers: [{
                                            color: '#ccdee9'
                                        }]
                                    }
                                ];
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    center: {
                                        lat: -31.197,
                                        lng: 150.744
                                    },
                                    zoom: 9,
                                    styles: grayStyles,
                                    scrollwheel: false
                                });
                            }
                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
