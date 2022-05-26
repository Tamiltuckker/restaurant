@extends('layouts.frontend.app')

@include('frontend.partials.header')

<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Cart Items</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Cart List</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->

<!-- Product Start -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Product Details</h5>
            <h1 class="mb-5">Product List</h1>
        </div>
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif
        {!! Form::open(['route' => 'orders.store', 'method' => 'post']) !!}
        @csrf
        <div class="row g-4">
            <table class="table table-bordered">
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qantity</th>
                    <th>SubTotal</th>
                </tr>
        </div>
        @foreach ($allDataDetails as $datas)
        @foreach($datas->items as $data)

        <tr>
            <td> <img src="{{ asset('/storage/' .$data['product']->image->attachmentable_image) }}" height="30" width="50" /></td>
            <td>{{ $data['name'] }}</td>
            <td>{{ $data['price'] }}</td>
            <td>{{ $data['quantity'] }}</td>
            <td>{{ $data['total'] }}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="3">Total Price</th>
            <td>{{ $datas->total }}</td>
        </tr>
        @endforeach
        </table>
        <div class="container bg-light">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">PLACE ORDER</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@include('frontend.partials.footer')