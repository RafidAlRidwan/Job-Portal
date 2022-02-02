<!-- header-start -->
<header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.html">
                                        <strong><h2 class="text-white">Job Portal</h2></strong>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href={{url('/')}}>Home</a></li>
                                            <li><a href={{url('/jobs')}}>Browse Job</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                @if(Auth::user())
                                @php
                                    $id = Auth::user()->id;
                                @endphp
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <a href={{url('/user/user-detail/'.$id)}}>Profile</a>
                                    </div>
                                    <div class="d-none d-lg-block">
                                        <a class="boxed-btn3" href={{route('user.logout')}}>Logout</a>
                                    </div>
                                </div>
                                @else
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <a href={{url('/admin-login')}}>Admin</a>
                                    </div>
                                    <div class="d-none d-lg-block">
                                        <a class="boxed-btn3" href={{url('/user-login')}}>User</a>
                                    </div>
                                </div>
                                @endif

                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
