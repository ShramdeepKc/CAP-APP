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
        <div class="outerBox">
          <div class="boxP">
            <a href="{{ $urls->app_url }}" target="_blank"> 
              <img class="logoP" src="{{asset('/image/'. $urls->image  )}}">
            </a>
            <div class="tld">
            	<span class="titleP">{{$urls->appName}}</span>
            	<div class="lineP"></div>
            	<span class="descriptionP" >{{$urls->description}}</span>
          	</div>
          </div>  <!-- End of a box 1 -->
        </div>
        @endforeach    
      </div>

      <div id="sideBar">
        <h3>About App <i class="fas fa-info-circle"></i></h3>
        <p>स्थानीय तहले सेवाग्राहीहरूलाई सुनिश्चित, निर्भर, र अधिक पहुँचयोग्य सेवाहरू एकीकृत माध्यमबाट प्रदान गर्नका लागि सेवाग्राही पोर्टल कार्यान्वयनमा ल्याएको छ। यो पोर्टलमा नागरिक/सेवाग्राहीले विभिन्न सेवाहरूमा सहजरूपमा आफ्नो आवश्यकता अनुरुप प्राप्तिको पहुँच गराउँछ । सेवाग्राही पोर्टलहरूले सेवाग्राहीलाई स्थानीय तह तथा मातहतबाट सेवाहरू प्राप्तिमा टेवा पुर्‍याउँछ।</p>
      </div>
    </main>
    
    
  <!-- cards and sideBar Puskar start -->
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
</script>


</body>
</html>
