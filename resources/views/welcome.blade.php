<?php
use Carbon\Carbon;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>
    <!-- Default css
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    -->
    <!-- puskar css pWelcome -->
    <link rel="stylesheet" href="{{asset('css/puskar.css')}}" />
    <!-- bootstrap
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    -->
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
    
    </style>
</head>
<body>


    <header>
      <img class="emblem" src="images/new-govt-logo.png" alt="Nepal govt emblem">
      <div class="munTitle">
        <h2> {{@$clientInfo[0]->mun_vdc}}</h2>
        <h4> {{@$clientInfo[0]->office_type}}</h4>
        <h5>{{@$clientInfo[0]->district}}</h5>
        <h5>{{@$clientInfo[0]->province}}</h5>
      </div>
      <h2 class="headerText">CLIENT <span>APP</span></h2>
      
      <div class="logBtn">
        <button>
          @if (Route::has('login'))
          @auth
          <a href="{{ route('homes.index') }}" class="nav-link">
            <i class="fas fa-sign-out-alt"></i> ड्यास्बोर्ड
          </a>
          @else
          <a href="{{ route('login') }}" class="nav-link">
            <i class="fas fa-sign-out-alt"></i> लग इन
          </a>
          @endauth
          @endif
        </button>
      </div>
    </header>
  <!-- Rough copy -->

  
  <!-- cards and sideBar Puskar start -->
    <main>
      <div id="allBoxes">
        @foreach($url as $urls)
        <div class="outerBox">
          <div class="boxP">
            <a href="{{ $urls->app_url }}" target="_blank"> 
              <img class="logoP" src="{{asset('/image/'. $urls->image  )}}">
            </a>
            <span class="titleP" >{{$urls->appName}}</span>
            <div class="lineP"></div>
            <span class="descriptionP" >{{$urls->description}}</span>
          </div>  <!-- End of a box 1 -->
        </div> 
        @endforeach    
      </div>

      <div id="sideBar">
        <h3>About App <i class="fas fa-info-circle"></i></h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisicing elit.Corrupti, quasi? Dolorum sunt illo, autem inventore rerum deserunt laboriosam similique voluptas quae totam quidem error, tempora modi. At reprehenderit blanditiis iste?</p>
      </div>
    </main>
  <!-- cards and sideBar Puskar start -->

</body>
</html>