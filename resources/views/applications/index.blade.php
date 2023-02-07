
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- ajx -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--css-->
 
    <h2 class="text-center">sample center heading</h2><br><br>

    <div class="mx-auto">
      <form method="POST" action="{{ route('logout') }}">
            <div class="col-md-12  text-left">
                    @csrf
                    <button type="submit" href="route('logout')" onclick="return myFunction();" class="btn btn-light">LOG OUT</button>

                    <!-- <a href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a> -->
                </form>
          </div>
        </div>



    </head>
  <body>


    <div  class="bg-image">
  <style> 
body {
  background-image: url("/images/mount.avif"), url("mount.avif");
   height: auto;
   background-size: cover;
 background-repeat: no-repeat;
  background-color: #cccccc;
 
 
}





</style>
    </div>

<div class="row mx-md-n5 ">
@foreach($url as $urls)

   
         <div class=" mx-auto ">
              <a href="{{ $urls->app_url }}" target="_blank"  style = "float:left" > <img class="img" src="/image/{{ $urls->image }}" width="80px"></a>
              <h6 class="text-center">{{ $urls->app->name_en }}</h6> 
          </div>                 
 
 
           
@endforeach
</div>
</div>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


 

  </body>


  

