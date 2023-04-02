@extends('layout')
   
@section('content')

<?php

use App\Models\Url;
use Illuminate\Support\Facades\DB;

 ?>
 <div class="container">
<div class="row ">
     @foreach($url as $urls)
      <div class="cards">
        <div class="card-content">
          <div class="card-icon">
          <a href="{{ $urls->app_url }}" target="_blank"  > <img class="img" src="{{asset('/image/'. $urls->image  )}}" width="80px"></a>
          </div>
          <div class="card-title" ><a href="{{$urls->app_url}}" target="_blank" style="text-decoration: none;   " >{{ $urls->appName }}</a></div>
          <div class="card-seperation">
            <img src="/images/divSeperation.png" alt="" />
          </div>
          <div class="card-description">{{$urls->description}}</div>
        </div> 
      </div>
      @endforeach
    </div>
</div>
@endsection