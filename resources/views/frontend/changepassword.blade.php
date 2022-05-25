{{-- @extends('layouts.frontend.app')
@section('content') --}}
@extends('layouts.frontend.app')
@include('frontend.partials.header')

<div class="container-xxl position-relative p-0">
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">ChangePassword</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">changepassword</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- Reservation Start -->
{{-- <div class="container"> --}}
<style type="text/css">
    .custom-centered {
        margin: 0 auto;
        width: 50%;
    }

</style>
<div class="custom-centered">

    {{-- <div class="col-md-6 bg-dark d-flex align-items-center"> --}}
    <div class="col-7 bg-dark d-flex align-items-center">
        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <h5 class="section-title ff-secondary text-start text-primary fw-normal">password</h5>
            <h1 class="text-white mb-4">Change Password</h1>
            <form method="POST" action="{{ route('change.password') }}">
                @csrf

                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
                <div class="form-group row">


                    <input id="password" type="password" class="form-control" name="current_password"
                        autocomplete="current-password" placeholder="Current Password">


                </div>
                <br>
                <div class="form-group row">

                    <input id="new_password" type="password" class="form-control" name="new_password"
                        autocomplete="current-password" placeholder="New Password">

                </div>
                <br>
                <div class="form-group row">



                    <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password"
                        autocomplete="current-password" placeholder="New Confirm Password">

                </div>
                <br>
                <div class="form-group row mb-0">
                    {{-- <div class="col-md-8 offset-md-4"> --}}
                    <button type="submit" class="btn btn-primary">
                        Update Password
                    </button>
                    {{-- </div> --}}
                </div>

            </form>
        </div>
    </div>
</div>
</div>
{{-- </div> --}}


@include('frontend.partials.footer')
