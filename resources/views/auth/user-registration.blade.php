@extends('auth.master')
@section('title')
    Registration
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
                            <h5 class="card-title text-center pb-0 fs-4">Registration</h5>
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

                        <form action="{{ url('/register') }}" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label for="name" class="form-label">Name</label>
                                <div class="input-group has-validation">
                                    <input type="text" autofocus name="name" class="form-control" id="name"
                                           required>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" autofocus name="email" class="form-control" id="email"
                                           required>
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label">Mobile Number</label>
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
                                <div class="form-group">
                                    <label for="cv">CV Upload</label>
                                    <input type="file" name="cv" class="custom-file-input" id="chooseFile">
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Submit</button>
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
