@extends('layout')
@section('content')

<?php

use App\Models\Url;
use Illuminate\Support\Facades\DB;

 ?>
    <main>
    <div id="allBoxes">
        @foreach($url as $urls)
        <div class="outerBox">
          <div class="boxP">
            <a href="{{ $urls->app_url }}" target="_blank"> 
              <img class="logoP" src="{{asset('/image/'. $urls->image  )}}">
            </a>
            <span class="titleP">{{$urls->appName}}</span>
            <div class="lineP"></div>
            <span class="descriptionP" >{{$urls->description}}</span>
          </div>  <!-- End of a box 1 -->
        </div>
        @endforeach    
      </div><!-- End of a allBoxes -->
    </main>
@endsection