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
    
    <!-- bootstrap
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- puskar css pWelcome -->
    <link rel="stylesheet" href="{{asset('css/puskar.css')}}" />
    <style>
      body {
        background: url("../images/candidateX.avif") no-repeat fixed;
        background-size: 100% 100% !important;
      }
    </style>
</head>
<body>
    <header>
      <img class="emblem" src="images/new-govt-logo.png" alt="Nepal govt emblem">
      <div class="munTitle">
        <h3> {{@$clientInfo[0]->mun_vdc}}</h3>
        <h4> {{@$clientInfo[0]->office_type}}</h4>
        <h5>{{@$clientInfo[0]->district}} </h5>
        <h5>{{@$clientInfo[0]->province}}</h5>
      </div>
      
      <h3 class="headerText"><span>{{$title}}</span></h3>
      <h3> {{ $dateBs }} <h3>
        &nbsp;
      <h3> <span id="timeset"></span> <h3>
     
    </h3>
    
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
  
  
  <!-- cards and sideBar Puskar start -->
  
  
    <main>
      <div id="allBoxes">
        @foreach($url as $urls)
        <div class="outerBox" >
          <div class="boxP">
            <a href="{{ $urls->app_url }}" target="_blank"> 
              <img class="logoP" src="{{asset('/image/'. $urls->image  )}}">
            </a>
            <div class="tld">
            <a href="{{ $urls->app_url }}" target="_blank" style="text-decoration: none; color: black;" >	<span class="titleP"  >{{$urls->appName}}</span></a>
            	<div class="lineP"></div>
              <a href="{{ $urls->app_url }}" target="_blank" style="text-decoration: none; color: black;" ><span class="descriptionP"  >{{$urls->description}}</span></a>
          	</div>
          </div>  <!-- End of a box 1 -->
        </div>
        @endforeach    
      </div>

    
    </main>
    <div id="sideBar">
        <h3><i class="fas fa-info-circle"></i></h3>
        <p style="text-align: justify;">{{$about}}</p>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- cards and sideBar  -->
<!-- Rough copy	-->
<script>
  const boxP = document.querySelectorAll('.boxP');
  const titleP = document.querySelectorAll('.titleP');
  const descriptionP = document.querySelectorAll('.descriptionP');

  window.addEventListener('resize', function() {
    boxP.forEach((box, index) => {
      const boxPHeight = box.clientHeight;
      let fontSizeT = boxPHeight / 10;
      titleP[index].style.fontSize = `${fontSizeT}px`;
      let fontSizeD = boxPHeight / 12;
      descriptionP[index].style.fontSize = `${fontSizeD}px`;
    });
  });


  $(window).ready(function () {
        onMenuDateTime();
   });
   // Set current timer
function onMenuDateTime() {
    var me = this;
    // alert("Image is loaded");
    myVar = setInterval(me.myTimer, 1000);
}

function myTimer() {
    var me = this;
    //    menuTimeset = $('#timeser');
    currentTime = new Date();
    if (currentTime.getHours() > 12) {
        var hours = currentTime.getHours() - 12;
    } else {
        var hours = currentTime.getHours();
    }
    var displayDateAd =
        hours + ":" + currentTime.getMinutes() + ":" + currentTime.getSeconds();
    // var displayDateAd = Date(currentTime, 'g:i:s');
    //    let options = {
    //     weekday: "long", year: "numeric", month: "short",
    //     day: "numeric", hour: "2-digit", minute: "2-digit"
    // };

    // console.log(currentTime.toLocaleTimeString("en-us", options));
    //    alert(displayDateAd);
    $("#timeset").html(displayDateAd);
    var hours = currentTime.getHours();
    am = Date(currentTime, "A");
    var text = "";
    // if (am == 'AM') {
    if (hours >= 0 && hours <= 4) {
        text = "रात्री";
        $("#timeset").html(displayDateAd + " " + text);
    }
    if (hours >= 5 && hours <= 11) {
        text = "बिहानी ";
        $("#timeset").html(displayDateAd + " " + text);
    }
    // } else {
    if (hours >= 12 && hours <= 16) {
        text = "अपरान्ह";
        $("#timeset").html(displayDateAd + " " + text);
    }
    if (hours >= 17 && hours <= 20) {
        text = "सन्ध्या";
        $("#timeset").html(displayDateAd + " " + text);
    }
    if (hours >= 21 && hours <= 23) {
        text = "रात्री";
        $("#timeset").html(displayDateAd + " " + text);
    }
    // }
}
//reset
</script>


</body>
</html>
