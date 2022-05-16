@extends('layouts.backend.app')

@section('content')
    <div class="card h-lg-100">
    <div class="card-header py-5 py-md-0 py-lg-5 py-xxl-0">
        <div class="card-title flex-column">
            <h3 class="fw-boldest m-0">Chefs Details</h3>
        </div>
        <div class="card-toolbar">
            <a href="{{route('webadmin.chefs.index')}}" class="btn btn-light btn-sm">Back</a>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex align-items-start mb-7">
            <div class="overlay rounded overflow-hidden w-75px w-lg-125px flex-shrink-0 me-7">
                <div class="overlay-wrapper rounded bg-light">
                <img src="{{asset('/storage/'.$chef->image->attachmentable_image)}}" alt="image" class="rounded w-100" height="30" width="50" />
                </div>
            </div>
            <div class="flex-grow-1 d-flex align-items-start justify-content-between flex-wrap py-24">
                <div class="d-flex flex-column align-items-start py-1 me-">
                    <div class="fs-3 text-dark text-hover-primary fw-boldest mb-2">{{ $chef->name }}</div>
                    <div class="fs-3 text-dark text-hover-primary fw-boldest mb-2">{{ $chef->designation }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection