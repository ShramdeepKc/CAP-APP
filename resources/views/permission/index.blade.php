@extends('layout')
@section('content')

<div class="formHead formHeadCr">
  <a class="btnB createB" href="{{ route('permission.create') }}">नयाँ प्रविष्टि</a>
</div>

<table class="table table-dark">
  <tr>
    <th>नं.</th>
    <th>अनुमति</th>
    <th width="100px">कार्य</th>
  </tr>
  @foreach ($permission as $perm)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $perm->name }}</td>
    <td>
      <form class="flex" method="post" action="{{ route('permission.destroy',$perm->id) }}" onsubmit="return confirm('sure?');">
        <a class="btn btn-primary" href="{{ route('permission.edit',$perm->id) }}">सच्याउने</a>  
        @csrf
        @method('delete')
        <button type="submit" class="btnB backB">मेटाउने</button>
      </form>
    </td>
  @endforeach
</table>
@endsection