@extends('layout')
   
@section('content')

<div class="row">
    @foreach($url as $urls)
    <div class="col">
      <div class="cards " >
        <div class="card-content">
          <div class="card-icon">
          <a href="{{ $urls->app_url }}" target="_blank"  > <img class="img" src="/image/{{ $urls->image }}" width="80px"></a>
          </div>
          <div class="card-title" >{{ $urls->appName }}</div>
          <div class="card-seperation">
            <img src="/images/divSeperation.png" alt="" />
          </div>
          <div class="card-description">{{$urls->description}}</div>
      </div>    
    </div>
</div>
   
@endforeach
</div>


@endsection