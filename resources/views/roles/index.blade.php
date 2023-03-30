@extends('layout')
@section('content')
<div class="pull-right">
                <a class="btn btn-success" href="{{ route('roles.create') }}"> भूमिका सिर्जना गर्नुहोस्</a>
            </div>
<table class="table table-dark" >
        <tr>
          
            <th>भूमिका </th>
          
            
            
           

            <th width="200px">कार्य</th>
        </tr>
        @foreach ($roles as $role)
        <tr>
            
            <td>{{ $role->name }}</td>
            <td><a class="btn btn-primary"  href="{{ route('roles.edit',$role->id) }}">सच्याउने</a>
        
            <form method="post"  action="{{ route('roles.destroy',$role->id) }}" onsubmit="return confirm('sure?');">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">मेटाउने</button>
            </form></td>
        </tr>
           
           @endforeach
          
    
    </table>


@endsection