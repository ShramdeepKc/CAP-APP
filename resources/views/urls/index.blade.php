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
            <th>App Name</th>
            <th>APP URL</th>
            <th>App Image</th>
            
           

            <th width="200px">Action</th>
        </tr>
        @foreach ($url as $urls)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $urls->code }}</td>
            <td>{{$urls->app->name_en}}</td>
            <td><a href="{{$urls->app_url}}" target="_blank">{{$urls->app->name_en}}</a></td>
            <td><img src="/image/{{ $urls->image }}" width="100px"></td>
          
           
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
   




<!-- @foreach($url as $urls)
 
<div class="card" style="width: 18rem;">
<a href="{{$urls->app_url}}" target="_blank"><img src="/image/{{ $urls->image }}" width="200px"></a>
  <div class="card-body">

  </div>
</div>
        


 @endforeach    -->

 <!-- @foreach($url as $urls)
 <div class="mx-auto">
 <div class="card" style="width: 18rem;">

  <a href="{{$urls->app_url}}" target="_blank"><img src="/image/{{ $urls->image }}" width="200px"></a>
  <div class="card-body">
    <div class="card-body">
      <h5 class="card-title">{{$urls->app->name_en}}</h5>
    </div>
    <div class="card-footer">
    <form action="{{ route('urls.destroy',$urls->id) }}" method="POST">
              <a class="btn btn-primary" href="{{ route('urls.edit',$urls->id) }}" >Edit</a>
              @csrf
                      @method('DELETE')
  
                      <button type="submit" onclick="return myFunction();" class="btn btn-danger">Delete</button>
                  </form>
    </div>
    <div class="card-footer">
      <small class="text-muted">{{$urls->created_at}}</small>
    </div>
  </div>
 </div>
</div>

@endforeach

<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>
<style>

.card{
    padding: 1.5em .5em .5em;
    border-radius: 2em;
    text-align: center;
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

</style> -->





    {!! $url->links() !!}


@endsection