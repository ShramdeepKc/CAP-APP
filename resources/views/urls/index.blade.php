@extends('layout')
   
@section('content')

  

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Url </h2>
            </div>
         
            <div class="pull-center">
                <a class="btn btn-success" href="{{ route('urls.create') }}"> Create New URL</a>
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
            <th>Clients</th>
            <th>App Name</th>
            <th>APP URL</th>
            <th>Description</th>

            <th>App Image</th>
            
           

            <th width="200px">Action</th>
            
        </tr>
        @foreach ($url as $urls)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $urls->code }}</td>
            <td>{{ $urls->clientName}}</td>
            <td>{{$urls->appName}}</td>
            <td><a href="{{$urls->app_url}}" target="_blank">{{$urls->appName}}</a></td>
            <td>{{$urls -> description}}</td>
            <td><img src="/image/{{ $urls->image }}" width="100px"></td>
            
            
            <td>
              
                <form action="{{ route('urls.destroy',$urls->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('urls.edit',$urls->id) }}" >Edit</a>
                  
                    @csrf
                    @method('DELETE')
                 
                    @can('view')
                    <button type="submit" onclick="return myFunction();" class="btn btn-danger">Delete</button>
                    @endcan
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





  


@endsection