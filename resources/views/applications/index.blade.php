<?php
 use App\Helpers\AppHelpers;
?>
@extends('layout')
   
   @section('content')





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
  

