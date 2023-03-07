@extends('layout')
@section('content')
<div class="pull-right">
                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            </div>
<table class="table table-dark" >
        <tr>
          
            <th>Roles</th>
          
            
            
           

            <th width="200px">Action</th>
        </tr>
        @foreach ($roles as $role)
        <tr>
            
            <td>{{ $role->name }}</td>
            <td><a class="btn btn-primary"  href="{{ route('roles.edit',$role->id) }}">Edit</a>
        
            <form method="post"  action="{{ route('roles.destroy',$role->id) }}" onsubmit="return confirm('sure?');">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
        </tr>
           
           @endforeach
          
    
    </table>


@endsection