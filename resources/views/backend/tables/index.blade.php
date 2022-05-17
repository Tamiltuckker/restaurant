@extends('layouts.backend.app')


@push('css')
<link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endpush

@push('js')
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/account/orders/classic.js')}}"></script>
@endpush

@section('content')
<div class="tab-content">
    <div id="kt_project_users_card_pane" class="tab-pane fade show active">
        <div class="row g-6 g-xl-9">
        @foreach ($tables as $table)
            <div class="col-md-6 col-xxl-4">
                <div class="card">
                    <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-boldest mb-1">{{$table->name}}</a>
                        <div class="fs-5 fw-bold text-gray-400 mb-6"> {{$table->capacity}} Persons</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection