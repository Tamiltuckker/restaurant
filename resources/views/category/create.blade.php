<html lang="en">
<head>
    <meta name="_token" content="{{csrf_token()}}" />
  
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
</head>
     @extends('layouts.frontend.app') 

    @section('content') 
     <meta name="_token" content="{{csrf_token()}}" /> 
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-7">
            <div class="card">
         
                <div class="card-header" style="text-align:center;">Category form</div>
              


                 <div class="card-body">
         
                 
                    {!! Form::open(['route' => 'Category.store','method' => 'post','files' => true  ]) !!}
                  
          
                    @csrf
                    @include('category.partials.form')
                    <br>
                 
                     {{ Form::submit('Click Me!',array('id' => 'submit'))}}
                    {{ Form::close() }}
                 </div> 
            </div>
        </div>
   </div>
  </div>
@endsection 
<body>  
</div>
