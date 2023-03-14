@extends('layout')
   
@section('content')

  
<div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create App</h2>
            </div>
         @can('view')
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('map.create') }}"> Map Url</a>
            </div>
        @endcan
            
        </div>
      
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-dark">
        <tr>
            <th>No</th>
            <th>Client</th>
            <th>Code</th>
            <th>Url</th>
            <th width="200px">Action</th>
        </tr>
        @foreach ($map as $maps)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $maps->clientName }}</td>
            <td>{{ $maps->code }}</td>
            <td><a href="{{$maps->url}}">{{ $maps->url }}</td>
            
           
            <td>
                <form action="{{ route('map.destroy',$maps->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('map.edit',$maps->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    
                    @can('view')
             
                    <button type="submit" onclick="return myFunction();" class="btn btn-danger">Delete</button>
                
                </form>
               @endcan
            </td>
        </tr>
     
 
        @endforeach
        <script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>
    
    </table>
   


    


@endsection