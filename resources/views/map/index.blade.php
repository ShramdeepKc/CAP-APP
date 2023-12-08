@extends('layout')
@section('content')

<div class="myWholeTable">
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
  
  <table class="table">
    <tr>
      <th>नं.</th>
      <th>ग्राहक</th>
      <th>कोड</th>
      <th>Core Url</th>
      <th>Public Url</th>
      <th>कार्य</th>
    </tr>
    @foreach ($map as $maps)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $maps->clientName }}</td>
      <td>{{ $maps->code }}</td>
      <td><a href="{{$maps->url}}">{{ $maps->url }}</td>
      <td><a href="{{$maps->c_url}}">{{ $maps->c_url }}</td>

      <td>
        <form action="{{ route('map.destroy',$maps->id) }}" method="POST">
          <a class="btnB submitB" href="{{ route('map.edit',$maps->id) }}">सच्याउने</a>
            @csrf
            @method('DELETE')
          <button type="submit" onclick="return myFunction();" class="btnB backB">मेटाउने</button>
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
