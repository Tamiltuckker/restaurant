@extends('layouts.backend.app')

@section('content')
<div class="card card-flush">
    <div class="card-header pt-8">
        <div class="card-title">
            <h2>Edit Tag</h2>
        </div>
    </div>
    <div class="card-body">
    {!! Form::model($tag,['route' => ['webadmin.tags.update', $tag->id], 'method' => 'put','files' => true  ]) !!}
                @csrf
                @include('backend.tags.partials.form')
                {!! Form::hidden("id", $tag->id ,['class' => 'col-sm-4']) !!}  
            {{ Form::close() }}
    </div>
</div>
@endsection 
