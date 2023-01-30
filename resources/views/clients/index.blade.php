@extends('layout') 






@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create App</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Create New Client</a>
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
            <th>Client Name</th>
            <th>Client Name nep</th>
            <th>Status</th>
            <th>APP-URL</th>

            <th width="200px">Action</th>
        </tr>
        @foreach ($client as $clients)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{$clients->code}}</td>
            <td>{{$clients->name_en}}</td>
            <td>{{$clients->name_np}}</td>
            <td>{{$clients->status}}</td>
            <td> <a href="{{ $clients->app->app_url}}" target="_blank"> {{$clients->app->name_en}} </a>   </td>
            <td>
            <form action="{{ route('clients.destroy',$clients->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('clients.edit',$clients->id) }}">Edit</a>
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
   
@endsection