@extends('user.partials.master')
@section('title')
    Home
@endsection
@section('main-content')
<!-- slider_area_start -->
<div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Find your Dream Job</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">We provide online instant cash loans with quick approval that suit your term length</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
            <img src="img/banner/illustration.png" alt="">
        </div>
    </div>
    <!-- slider_area_end -->
    <!-- job_listing_area_start  -->
    <div class="job_listing_area pt-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section_title">
                            <h3>Job Listing</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="brouse_job text-right">
                            <a href={{url('/jobs')}} class="boxed-btn4">Browse More Job</a>
                        </div>
                    </div>
                </div>
                <div class="job_lists">
                    <div class="row">
                    @foreach($jobs as $value)
                        <div class="col-lg-12 col-md-12">
                            <div class="single_jobs white-bg d-flex justify-content-between">
                                <div class="jobs_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src={{$value['thumbnail']}} height="80">
                                    </div>
                                    <div class="jobs_conetent">
                                        <a href={{url('job-details/'.$value['slug'])}}><h4>{{$value['job_title']}}</h4></a>
                                        <div class="links_locat d-flex align-items-center">
                                            <div class="location">
                                                <p> <i class="fa fa-map-marker"></i> {{$value['job_location']}}</p>
                                            </div>
                                            <div class="location">
                                                <p> <i class="fa fa-clock-o"></i>{{$value['job_type']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="jobs_right">
                                        <div class="apply_now">
                                            <a href={{url('user/apply-job/'.$value['id'])}}><button class="boxed-btn3">Apply Now</button></a>
                                        </div>
                                    <div class="date">
                                        @php
                                            $date = date("d M Y",strtotime($value['dead_line']));
                                        @endphp
                                        <p>Deadline: {{$date}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
    <!-- job_listing_area_end  -->



    <!-- job_searcing_wrap  -->
    <div class="job_searcing_wrap overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a Job?</h3>
                        <p>We provide online instant cash loans with quick approval </p>
                        <a href={{url('/user-login')}} class="boxed-btn3">Browse Job</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_searcing_wrap end  -->
@endsection
