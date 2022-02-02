@extends('auth.master')
@section('title')
    User Login
@endsection
@section('main-content')
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                        <span class="d-none d-lg-block"><a href={{url('/')}}><h2>Job Portal</h2></a></span>
                    </a>
                </div><!-- End Logo -->

                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">User Login</h5>
                            <p class="text-center small">Enter your mobile number & password to login</p>
                        </div>
                        @if(Session::has('success'))
                                <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                                    {{Session::get('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                                {{ session()->get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('user.login.post') }}" method="POST" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-12">
                                <label for="email" class="form-label">Mobile Number</label>
                                <div class="input-group has-validation">
                                    <input type="text" autofocus name="phone" class="form-control" id="phone"
                                           required>
                                    @if ($errors->has('phone'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                       required>
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif


                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Login</button>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success w-100"><a class="text-white" href={{url('/user-registration')}}>Register Here</a></button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="credits">

                </div>

            </div>
        </div>
    </div>

</section>
@endsection
