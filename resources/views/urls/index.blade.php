@extends('layout')
   
@section('content')

  
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Url</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('urls.create') }}"> Create  URL</a>
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
            <th>App Name</th>
            <th>APP URL</th>
            
           

            <th width="200px">Action</th>
        </tr>
        @foreach ($url as $urls)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $urls->code }}</td>
            <td>{{$urls->app->name_en}}</td>
            <td><a href="{{$urls->app_url}}" target="_blank">{{$urls->app->name_en}}</a></td>
          
           
            <td>
            <form action="{{ route('urls.destroy',$urls->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('urls.edit',$urls->id) }}" >Edit</a>
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
    








    
   


    {!! $url->links() !!}


@endsection