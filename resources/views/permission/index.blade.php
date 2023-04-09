@extends('layout')
@section('content')

<div class="pBtnMarginBottom">
  <a class="btn btn-success" href="{{ route('permission.create') }}"> नयाँ प्रविष्टि  </a>
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
            <td><a class="btn btn-primary" href="{{ route('permission.edit',$perm->id) }}">सच्याउने</a>
        
            <form method="post"  action="{{ route('permission.destroy',$perm->id) }}" onsubmit="return confirm('sure?');">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">मेटाउने</button>
            </form></td>
           
           
           @endforeach
          
    
    </table>
@endsection