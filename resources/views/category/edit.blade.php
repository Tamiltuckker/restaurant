@extends('layouts.frontend.app') 

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Data
  </div>
  <div class="card-body">
 
  
          <div class="form-group">
           @csrf
           @method('put')
              
      {!! Form::model($txt,['url' =>['Category/update', $txt->id], 'method' => 'put' ,'files' => true])!!} 
      {{ csrf_field() }} 
          @include('category.partials.form')
          </div>
     
        
          <img src="{{asset('/storage/'.$txt->image->attachmentable_image)}}" height="30" width="50"/>
          <button type="submit" class="btn btn-primary">Update Data</button>
          {!! Form::hidden("id", $txt->id ,['class' => 'col-sm-4']) !!}
          {!! Form::close() !!}
          
      </form>
  </div>
</div>

@endsection