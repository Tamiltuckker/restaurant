@extends('layouts.backend.app')

@section('content')
<div class="card card-flush">
    <div class="card-header pt-8">
        <div class="card-title">
            <h2>Edit Product</h2>
        </div>
    </div>
    <div class="card-body">
    {!! Form::model($product,['route' => ['webadmin.products.update', $product->id], 'method' => 'put','files' => true  ]) !!}
                @csrf
                @include('backend.products.partials.form')
                <img src="{{asset('/storage/'.$product->image->attachmentable_image)}}" height="30" width="50"/>
                {!! Form::hidden("id", $product->id ,['class' => 'col-sm-4']) !!}  
            {{ Form::close() }}
    </div>
</div>
@endsection 
