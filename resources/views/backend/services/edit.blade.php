@extends('layouts.backend.app')

@section('content')
<div class="card card-flush">
    <div class="card-header pt-8">
        <div class="card-title">
            <h2>Edit Service</h2>
        </div>
    </div>
    <div class="card-body">
    {!! Form::model($service,['route' => ['webadmin.services.update', $service->id], 'method' => 'put','files' => true  ]) !!}
                @csrf
                @include('backend.services.partials.form')
                <img src="{{asset('/storage/'.$service->image->attachmentable_image)}}" height="30" width="50"/>
                {!! Form::hidden("id", $service->id ,['class' => 'col-sm-4']) !!}  
            {{ Form::close() }}
    </div>
</div>
@endsection 
