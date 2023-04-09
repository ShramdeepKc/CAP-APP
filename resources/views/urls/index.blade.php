@extends('layout')
   
@section('content')

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
              <h2> Url सूची </h2>
              <a class="btn btn-success pBtnMarginBottom" href="{{ route('urls.create') }}">Create</a>
            </div>
         
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('errors'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>

   
    

   
  <table class="table table-dark">
        <tr>
            <th>नं.</th>
            <th>कोड </th>
            <th>ग्राहक </th>
            <th>एप नाम</th>
            <th>एप URL</th>
            <th>विवरण</th>
            <th>एप लोगो</th>
            <th width="200px">कार्य</th>
        </tr>
        @foreach ($url as $urls)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $urls->code }}</td>
            <td>{{ $urls->clientName}}</td>
            <td>{{$urls->appName}}</td>
            <td><a href="{{$urls->app_url}}" target="_blank">{{$urls->appName}}</a></td>
            <td>{{$urls -> description}}</td>
            <td><img src="{{asset('/image/'. $urls->image  )}}" width="30px"></td>
            
            
            <td>
              
                <form action="{{ route('urls.destroy',$urls->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('urls.edit',$urls->id) }}" >सच्याउने </a>
                  
                    @csrf
                    @method('DELETE')
                 
                    @can('view')
                    <button type="submit" onclick="return myFunction();" class="btn btn-danger">मेटाउने</button>
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