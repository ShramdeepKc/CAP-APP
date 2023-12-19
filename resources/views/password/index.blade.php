@extends('layout')
   
@section('content')

  

   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    

   
  <table class="table table-dark">
        <tr>
            <th>{{ __('public.No') }}.</th>
            <th>{{ __('public.Client') }}</th>
            <th>{{ __('public.Action') }}</th>
           
            
           

            
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



