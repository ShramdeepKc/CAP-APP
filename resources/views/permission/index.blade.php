@extends('layout')
@section('content')

<div class="pull-right">
                <a class="btn btn-success" href="{{ route('permission.create') }}"> Create New Permission</a>
            </div>
<table class="table table-dark">
        <tr>
            <th>No</th>
            <th>Permission</th>
         
            
           

            <th width="100px">Action</th>
        </tr>
        @foreach ($permission as $perm)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $perm->name }}</td>
            <td><a class="btn btn-primary" href="{{ route('permission.edit',$perm->id) }}">Edit</a>
        
            <form method="post"  action="{{ route('permission.destroy',$perm->id) }}" onsubmit="return confirm('sure?');">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
           
           
           @endforeach
          
    
    </table>
@endsection