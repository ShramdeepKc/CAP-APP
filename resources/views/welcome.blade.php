<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
  <!-- bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
  
        
        </div>
   
   <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
       @if (Route::has('login'))
           <div class="col-md-12  text-right">
         @auth
      <a href="{{ url('applications') }}" class="btn btn-outline-light">Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="btn btn-outline-light">Log in</a>
       
            @if (Route::has('register'))
        <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
           @endif
           @endauth
                           
           </div>
         @endif
   </div>


        <style>
             
            body {
                background-image: url("/images/mount.avif"), url("mount.avif");
   height: auto;
   background-size: 200vh;
  background-color: #cccccc;
                font-family: 'Nunito', sans-serif;
            }
        </style>
</head>


    <body class="antialiased">


<div class="row mx-md-n5 ">
@foreach($url as $urls)

   
         <div class=" mx-auto ">
              <a href="{{ $urls->app_url }}" target="_blank"  style = "float:left" > <img class="img" src="/image/{{ $urls->image }}" width="80px"></a>
              <h6 class="text-center">{{ $urls->app->name_en }}</h6> 
          </div>                 
 
 
           
@endforeach
<style>
  img {
  opacity: 0.8;
  border: 1px solid #ccc;
   width: 100px;
  border-radius: 50%;
  text-align: center;
  display: block;
  margin-left: auto;
  margin-right: auto;

}
</style>





</html>
