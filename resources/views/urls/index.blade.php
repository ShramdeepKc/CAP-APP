@extends('layout')
@section('content')

<div class="myWholeTable">
  <div class="formHead formHeadCr">
    <h2> Url सूची </h2>
    <a class="btnB createB" href="{{ route('urls.create') }}">Create</a>
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
   
  <table class="table table-dark table-responsive">
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
      <td><img src="{{asset('/image/'. $urls->image  )}}" width="70px"></td>
      <td>
        <form action="{{ route('urls.destroy',$urls->id) }}" method="POST">
          <a class="btnB submitB" href="{{ route('urls.edit',$urls->id) }}">सच्याउने </a>
            @csrf
            @method('DELETE')
            @can('view')
          <button type="submit" onclick="return myFunction();" class="btnB backB">मेटाउने</button>
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
</div>
@endsection
