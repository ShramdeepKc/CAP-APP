<?php
 use App\Helpers\AppHelpers;
?>
  @extends('layout')
  @section('content')
</head>

<body>

<div class="myWholeTable">
  <div class="formHead formHeadCr">
    <h2> Url सूची </h2>
    <a class="btnB createB" href="{{ route('applications.create') }}">नयाँ प्रविष्टि</a>
  </div>

  <table class="table table-dark">
    <tr>
      <th>नं.</th>
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
      <td>
        <form class="flex" action="{{ route('applications.destroy',$application->id) }}" method="POST">
          <a class="btnB submitB" href="{{ route('applications.edit',$application->id) }}">
            सच्याउने
          </a>
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return myFunction();" class="btnB backB">मेटाउने</button>
        </form>
      </td>
    </tr>
    @endforeach
    <script>
      function myFunction() {
        if(!confirm("Are You Sure to delete this ?"))
          event.preventDefault();
      }
    </script>
  </table>
    </div>
</body>
@endsection
  

