<?php
 use App\Helpers\AppHelpers;
?>
@extends('layout')
   
   @section('content')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- ajx -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--css-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    




    </head>
    <div class="pull-center">
                <a class="btn btn-success" href="{{ route('applications.create') }}">Assign Apps </a>
            </div>
  <body>
    
  <table class="table table-dark">
        <tr>
            <th>No</th>
            <th>Clients</th>
            <th>App Name</th>
            <th>Action</th>
        </tr>
            @foreach ($applications as $application)
          <tr>  
            <td>{{ ++$i }}</td>
            <td>{{ $application->clientName }}</td>
           <td>
            <?php 
           

            $appId = explode(',',$application->app_id);
            // print_r($appList)
             foreach($appId as $app){
            $appName = AppHelpers::getAppNameById($app);
            echo $appName," , " ;
             }
             ?>
           
          </td>      
           <td> <form action="{{ route('applications.destroy',$application->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('applications.edit',$application->id) }}">Edit</a>
            @csrf
                    @method('DELETE')
              
             
                    <button type="submit" onclick="return myFunction();" class="btn btn-danger">Delete</button>
                
                </form></td>

          </tr> 
          @endforeach
          <script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>
    </table>


 

  </body>

@endsection
  

