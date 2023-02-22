@extends('layout')
   
@section('content')

  

   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    

   
  <table class="table table-dark">
        <tr>
            <th>No</th>
            <th>Users</th>
            <th>Action</th>
           
            
           

            
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name}}</td>
            <td>
            <div class="flex justify-end">
     <div class="flex space-x-2">
           <a href="{{ route('users.show', $user->id) }}"class="btn btn-primary">Roles</a>
             <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"  method="POST" action="{{ route('users.destroy', $user->id) }}"onsubmit="return confirm('Are you sure?');">
                                     @csrf
                                    @method('DELETE')
                                 <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                       </div>
                    </div>
            </td>
         </tr>
        
        
        @endforeach
    
    </table>





  


@endsection