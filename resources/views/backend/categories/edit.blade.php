@extends('layouts.backend.app')


@section('content')
<div class="card card-flush">
    <div class="card-header pt-8">
        <div class="card-title">
            <h2>Edit Category</h2>
        </div>
    </div>
    <div class="card-body">
    {!! Form::model($txt,['route' => ['webadmin.categories.update', $txt->id], 'method' => 'put','files' => true  ]) !!}
                @csrf
                @include('backend.categories.partials.form')
                <img src="{{asset('/storage/'.$txt->image->attachmentable_image)}}" height="30" width="50"/>
                {!! Form::hidden("id", $txt->id ,['class' => 'col-sm-4']) !!}  
            {{ Form::close() }}
    </div>
</div>
@endsection 
