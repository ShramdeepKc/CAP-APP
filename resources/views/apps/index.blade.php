@extends('layout')
   
@section('content')

  
<div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create App</h2>
            </div>
          
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('apps.create') }}"> Create New App</a>
            </div>

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
            <th>Code</th>
            <th>English Name</th>
            <th>Nepali Name</th>
            <th>Status</th>
           

            <th width="200px">Action</th>
        </tr>
        @foreach ($app as $apps)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $apps->code }}</td>
            <td>{{ $apps->name_en }}</td>
            <td>{{ $apps->name_np }}</td>
            <td>{{ $apps->status }}</td>
           
            <td>
              
            <form action="{{ route('apps.destroy',$apps->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('apps.edit',$apps->id) }}">Edit</a>
            @csrf
                    @method('DELETE')
              
             
                    <button type="submit" onclick="return myFunction();" class="btn btn-danger">Delete</button>
                
                </form>
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
   


    {!! $app->links() !!}


@endsection