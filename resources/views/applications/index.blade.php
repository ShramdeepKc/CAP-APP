<?php
 use App\Helpers\AppHelpers;
?>
@extends('layout')
@section('content')
<head>
  <!-- Your head content here -->
</head>
<body>
  <div class="myWholeTable">
    <div class="formHead formHeadCr">
      <h2>APP सूची </h2>
      <a class="btnB createB" href="{{ route('applications.create') }}">नयाँ प्रविष्टि</a>
    </div>

    <table class="table">
      <tr>
        <th>नं.</th>
        <th>Clients</th>
        <th>App Name</th>
        <th>Type</th>
        <th>Action</th>
      </tr>
      @foreach ($applications as $key => $application)
      <tr>  
        <td>{{ $key + 1 }}</td>
        <td>{{ $application->clientName }}</td>
        <td>
          <?php 
            $appId = explode(',', $application->app_id);
            foreach($appId as $app){
              $appName = AppHelpers::getAppNameById($app);
              echo $appName . ", " ;
            }
          ?>
        </td>
        <td>@if($application->is_public == true) Public @else Core @endif</td> <!-- Display is_public value -->
        <td>
          <form action="{{ route('applications.destroy', $application->id) }}" method="POST">
            <a class="btnB submitB" href="{{ route('applications.edit', $application->id) }}">
              सच्याउने
            </a>
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return myFunction();" class="btnB backB">मेटाउने</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>

  <script>
    function myFunction() {
      if(!confirm("Are You Sure to delete this ?"))
        event.preventDefault();
    }
  </script>
</body>
@endsection


