@extends('layout')
   
@section('content')
<div class="body-content">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-6">
                @foreach($url as $urls)
                <div class="col-md-4 mb-4">
                    <div class="cards">
                        <div class="card-content">
                            <div class="card-icon">
                                <a href="{{ $urls->app_url }}" target="_blank"> <img class="img"
                                        src="{{asset('/image/'. $urls->image  )}}" width="80px"></a>
                            </div>
                            <div class="card-title"><a href="{{$urls->app_url}}" target="_blank"  style="text-decoration: none;  color:black "> {{ $urls->appName }}</a></div>
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

        @endsection