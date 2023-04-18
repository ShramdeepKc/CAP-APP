@extends('layout')   
@section('content')
<div class="myWholeTable">
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif
  <table class="table table-dark">
    <tr>
      <th>नं.</th>
      <th>प्रयोगकर्ताहरू</th>
      <th>कार्य</th>
      <th>Password Reset</th>
    </tr>
  
    @foreach ($users as $user)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $user->name}}</td>
      <td>
        <form method="POST" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure?');">
          <a href="{{ route('users.show', $user->id) }}" class="btnB submitB">भूमिका</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger"> मेटाउन</button>
        </form>
      </td>
      <td>
        <a href="{{ route('users.edit' , $user->id ) }}" class="btn btn-primary">Change password</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>


  


@endsection
