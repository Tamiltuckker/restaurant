@extends('layouts.backend.app')


@section('content')
<div class="card card-flush">
    <div class="card-header pt-8">
        <div class="card-title">
            <h2>Create Category</h2>
        </div>
    </div>
    <div class="card-body">
            {!! Form::open(['route' => 'webadmin.categories.store','method' => 'post','files' => true  ]) !!}
                @csrf
                @include('backend.categories.partials.form')
            {{ Form::close() }}
    </div>
</div>
@endsection 
