<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <style>
    @font-face {
        font-family: kalimati;
        src: url('fonts/kalimati');
    }

    body {
        font-family: kalimati;
    }
    </style>
</head>

<body>
    <div class="container1">
        <nav class="navbar nav-prop">
            <div class="container-fluid">
                <div class="head-title">
                    <img src="images/new-govt-logo.png" width="90" height="80" class="logo">
                    <div class="mun-title text-white">
                    <h3 class="text-center"> {{@$clientInfo[0]->mun_vdc}}</h2>
                    <h3 class="text-center"> {{@$clientInfo[0]->office_type}}</h2>
                    <h4 class="text-center">{{@$clientInfo[0]->province}}</h3>
                    </div>
                </div>
                <h2 class="nav-text">CLIENT <span>APP PORTAL</span></h2>
                <button class="nav-btn">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ route('homes.index') }}" class="nav-link" style="color: 	#F0E2DF">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="nav-link">
                        <i class="fa fa-sign-in pr-4" aria-hidden="true"></i><span
                            class="d-sm-none d-md-inline-block">LOGIN</span></a>

                    <!-- @if (Route::has('register'))
                 <a href="{{ route('register') }}">Register</a>
                    @endif -->
                    @endauth

                    @endif
            </div>
            </button>

        </nav>
 <?php

use App\Models\Url;
use Illuminate\Support\Facades\DB;

 ?>
 <?php 
 $urls = DB::table('urls')
         ->select('app_id')
         ->get();
        //  dd($urls);
      
 if($urls->count()>4){
 ?>
        <div class="body-content">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-6">
                @foreach($url as $urls)
                <div class="col-md-4 mb-4">
                    <div class="cards">
                        <div class="card-content">
                            <div class="card-icon">
                                <a href="{{ $urls->app_url }}" target="_blank"> <img class="img"
                                        src="/image/{{ $urls->image }}" width="80px"></a>
                            </div>
                            <div class="card-title">{{ $urls->appName }}</div>
                            <div class="card-seperation">
                                <img src="/images/divSeperation.png" alt="" />
                            </div>
                            <div class="card-description">{{$urls->description}}</div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <?php }  else{ ?>
       
        <div class="body-content">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3">
                @foreach($url as $urls)
                <div class="col-md-4 mb-4">
                    <div class="cards">
                        <div class="card-content">
                            <div class="card-icon">
                                <a href="{{ $urls->app_url }}" target="_blank"> <img class="img"
                                        src="/image/{{ $urls->image }}" width="80px"></a>
                            </div>
                            <div class="card-title">{{ $urls->appName }}</div>
                            <div class="card-seperation">
                                <img src="/images/divSeperation.png" alt="" />
                            </div>
                            <div class="card-description">{{$urls->description}}</div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <?php } ?>

</body>

</html>