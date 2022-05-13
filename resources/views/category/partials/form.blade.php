 @csrf
 
  <div class="form-group">
                 
    {{ Form::label('name', 'Name', array('class' => 'col-sm-2')) }}
     {{ Form::text('name') }}
   
   </div>
     <br>
     <br>
    
     {{ Form::label('name', 'Image', array('class' => 'col-sm-2')) }}
     {{ Form::file('image',)}}
  
  
     <br>
     <br> 