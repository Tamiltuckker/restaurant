@extends('layouts.backend.app')

@section('content')
<div class="card card-flush">
    <div class="card-header pt-8">
        <div class="card-title">
            <h2>Edit Chef</h2>
        </div>
    </div>
    <div class="card-body">
    {!! Form::model($chef,['route' => ['webadmin.chefs.update', $chef->id], 'method' => 'put','files' => true  ]) !!}
                @csrf
                @include('backend.chefs.partials.form')
                <img src="{{asset('/storage/'.$chef->image->attachmentable_image)}}" height="30" width="50"/>
                {!! Form::hidden("id", $chef->id ,['class' => 'col-sm-4']) !!}  
            {{ Form::close() }}
    </div>
</div>
@endsection 
