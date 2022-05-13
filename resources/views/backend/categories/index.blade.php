@extends('layouts.backend.app')

@push('css')
<link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endpush

@push('js')
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/account/orders/classic.js')}}"></script>
@endpush

@section('content')
<!--begin::Card-->
<div class="card">
    <div class="card-header">
        <div class="card-title flex-column">
            <h3 class="fw-boldest m-0">Category List</h3>
        </div>
        
        <div class="card-toolbar">
             <div class="me-6 my-1">
             <a class="btn btn-sm btn-success" href="{{route('webadmin.categories.create')}}"> Create New Category</a>

            </div>
            <div class="me-6 my-1">
                <select id="kt_filter_year" name="year" data-control="select2" data-hide-search="true" class="w-125px form-select form-select-sm form-select-solid">
                    <option value="All" selected="selected">All time</option>
                    <option value="thisyear">This year</option>
                    <option value="thismonth">This month</option>
                    <option value="lastmonth">Last month</option>
                    <option value="last90days">Last 90 days</option>
                </select>
            </div>
            <div class="me-4 my-1">
                <select id="kt_filter_orders" name="orders" data-control="select2" data-hide-search="true" class="w-125px form-select form-select-sm form-select-solid">
                    <option value="All" selected="selected">All Orders</option>
                    <option value="Approved">Approved</option>
                    <option value="Declined">Declined</option>
                    <option value="In Progress">In Progress</option>
                    <option value="In Transit">In Transit</option>
                </select>
            </div>
            <!--end::Select-->
            <!--begin::Search-->
            <div class="position-relative w-175px my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-3 position-absolute ms-7 top-50 translate-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" id="kt_filter_search" class="form-control form-control-sm form-control-solid ps-12" placeholder="Search Order" />
            </div>
            <!--end::Search-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end:Card header-->
    <!--begin:Card body-->
    @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif
    <div class="card-body">

        <!--begin::Table-->
        <table id="kt_orders_classic" class="table table-row-bordered table-row-dashed g-3 gs-0 align-middle">
            <thead class="fs-7 fw-boldest text-gray-400 text-uppercase">
                <tr>
                    <th class="min-w-200px">Image</th>
                    <th class="min-w-100px">Name</th>
                    <th class="min-w-150px text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="fs-6 fw-boldest">
              @foreach ($devices as $device )
                <tr>
                    <td>
                        <div class="d-flex">
                            <div class="symbol symbol-75px me-6 bg-light">
                                <img src="{{asset('/storage/'.$device->image->attachmentable_image)}}"  alt="image" >
                            </div>
                        </div>
                    </td>
                    <td>{{$device->name }}</td>
                    <td class="text-end">
                        <a href="{{route('webadmin.categories.show',$device->id) }}" class="btn btn-light btn-sm me-2">View</a>
                        <a href="{{route('webadmin.categories.edit',$device->id)}}" class="btn btn-light btn-sm">Edit</a>
                        <a href="{{route('webadmin.categories.destroy',$device->id)}}" class="btn btn-light btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection