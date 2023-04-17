@extends('layout')
   
@section('content')

  
<div class="formHead formHeadCr">
  <h2>Url नक्सा</h2>
  <a class="btnB createB" href="{{ route('map.create') }}">
    Create
  </a>
</div>
 
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif
  <div class="table-responsive">   
  <table class="table table-dark">
    <tr>
      <th>नं.</th>
      <th>ग्राहक</th>
      <th>कोड</th>
      <th>Url</th>
      <th width="200px">कार्य</th>
    </tr>
    @foreach ($map as $maps)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $maps->clientName }}</td>
      <td>{{ $maps->code }}</td>
      <td><a href="{{$maps->url}}">{{ $maps->url }}</td>
      <td>
        <form action="{{ route('map.destroy',$maps->id) }}" method="POST">
          <a class="btn btn-primary" href="{{ route('map.edit',$maps->id) }}">सच्याउने</a>
            @csrf
            @method('DELETE')
          <button type="submit" onclick="return myFunction();" class="btn btn-danger">मेटाउने</button>
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