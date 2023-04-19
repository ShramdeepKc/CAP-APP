@extends('layout')
@section('content')

<?php

use App\Models\Url;
use Illuminate\Support\Facades\DB;

 ?>
  <main>
    <div id="allBoxes" class="layoutB">
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

<script>
  const boxP = document.querySelectorAll('.boxP');
  const titleP = document.querySelectorAll('.titleP');
  const descriptionP = document.querySelectorAll('.descriptionP');

  function adjustFontSizes() {
    boxP.forEach((box, index) => {
      const boxPHeight = box.clientHeight;
      let fontSizeT = boxPHeight / 10;
      titleP[index].style.fontSize = `${fontSizeT}px`;
      let fontSizeD = boxPHeight / 12;
      descriptionP[index].style.fontSize = `${fontSizeD}px`;
    });
  }

  window.addEventListener('load', adjustFontSizes);
  window.addEventListener('resize', adjustFontSizes);
</script>

    </main>
@endsection

