@extends('layout')
   
@section('content')

  

   
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
           
            
           

            
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name}}</td>
            <td>
            </td>
            
         </tr>
        
        
        @endforeach
    
    </table>



