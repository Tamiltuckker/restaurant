@extends('layouts.frontend.app') 
<title>{{ ('Form') }}</title>
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Details</div>
             


                <div class="card-body">
                  Name:{{ $data->name }}
                  <br>
                  image: <img src="{{asset('/storage/'.$data->image->attachmentable_image)}}" height="30" width="50"/>
   </div> 
</div>
</div>
</div>
</div>
 
   
@endsection