
   @extends('layouts.app')
 
   @section('content')
       <div class="row">
           <div class="col-lg-12 margin-tb">
               <div class="pull-left">
                   <h2>Show list</h2>
               </div>
               <div class="pull-right">
             
                   <a class="btn btn-success" href="{{route('Category.create')}}"> Create New Category</a>
               </div>
           </div>
       </div>
      
       @if ($message = Session::get('success'))
           <div class="alert alert-success">
               <p>{{ $message }}</p>
           </div>
       @endif
      
       <table class="table table-bordered">
           <tr>
               <th>No</th>
               <th>Name</th>
               <th>image</th>
               <th width="280px">Action</th>
           </tr>
           @foreach ($devices as $device )
           <tr>
            
              
               <td>{{$device->id }}</td>
               <td>{{$device->name }}</td>
               <td><img src="{{asset('/storage/'.$device->image->attachmentable_image)}}" height="30" width="50"/></td>
              <td>
                 <a href="{{route('Category.show',$device->id)}}" class="btn btn-info">Show</a>
                  <a href="{{route('Category.edit',$device->id)}}" class="btn btn-primary">Edit</a>
                  <a href="{{route('Category.destroy',$device->id)}}" class="btn btn-danger">delete</a>
             </td>
           </tr>
           @endforeach
       </table>
      @endsection