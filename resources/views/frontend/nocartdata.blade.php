@extends('layouts.frontend.app')

@include('frontend.partials.header')

<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Purchase Your Products</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Purchase Your Products</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="container bg-light">
            <div class="col-md-12 text-center">
                <h1>No Records Found</h1>
                <a class="btn btn-lg btn-primary" type="submit"  href="{{ route('frontend.dashboard')}}">Go To Shopping</a>
            </div>
        </div>
    </div>
</div>
@include('frontend.partials.footer')