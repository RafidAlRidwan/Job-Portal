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
                        <h3>Jobs Available</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--/ bradcam_area  -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="job_filter white-bg">
                        <div class="form_inner white-bg">
                            <h3>Filter</h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <input type="text" placeholder="Search keyword">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="reset_btn">
                            <button  class="boxed-btn3 w-100" disabled type="">Reset</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>Job Listing</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="job_lists m-0">
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
                                                <p> <i class="fa fa-map-marker"></i>{{$value['job_location']}}</p>
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
                                        @php
                                            $date = date("d M Y",strtotime($value['dead_line']));
                                        @endphp

                                    <div class="date">
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
        </div>
    </div>
    <!-- job_listing_area_end  -->
@endsection
