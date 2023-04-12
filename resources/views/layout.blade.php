<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <!-- puskar fontawesome icon -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
      <!-- puskar css -->
    <link rel="stylesheet" href="{{asset('css/puskar.css')}}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/convert_unicode.js')}}"></script>
    <style>
    <?php use App\Models\Background;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;

    $background=Background::all();

    foreach($background as $b) {
        if($b->client_id==Auth::user()->client_id) {
            $bg_image=$b->image;
        }
    }

    if(@$bg_image) {
        $bg_image="/image/".$bg_image;
    }

    else {
        $bg_image="/images/candidateX.avif";
    }

    // ->where('client_id',Auth::user()->client_id)
    // ->select('image');
    // dd($background);
    ?>
    body {
      background-image: url({{$bg_image}});
      background-repeat: no-repeat;
      background-position: center center;
      background-attachment: fixed;
      background-size: cover;
    }
    </style>
</head>

<body>
    <header class="layoutHeader">
      <nav id="navMenu">
        <i id="navSpan" class="fa fa-bars" aria-hidden="true"></i>
        <ul id="navUl">
            <li>
              <a href="{{route('homes.index')}}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li><a href="{{route('background.create')}}">Bg Img</a></li>
            <li><a href="{{route('urls.index')}}">Url List</a></li>
          @can('view')
            <li><a href="{{route('apps.index')}}">Apps List</a></li>
            <li><a href="{{route('applications.index')}}">Applications</a></li>
            <li><a href="{{route('roles.index')}}">Roles</a></li>
            <li><a href="{{route('permission.index')}}">Permissions</a></li>
            <li><a href="{{route('users.index')}}">Users</a></li>
            <li><a href="{{route('map.index')}}">Url Map</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
          @endcan
          </ul>
        </nav>

      <a id="clientPortalApp_LayoutBlade" href="{{route('homes.index')}}">
        Client <span>Portal App</span>
      </a>
      
      <div id="headerDivB">
        <div class="layoutBladeSystemUserText">
          <i class="fa fa-user-o" aria-hidden="true"></i>
          <span>{{ $user = auth()->user()->name; }}</span>
        </div>

        <div class="logBtn">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" href="route('logout')" onclick="return myFunction();">
              <i class="fa fa-sign-out " aria-hidden="true"></i>
              बाहिर जाने
            </button>
          </form>
        </div>
      </div>
    </header>

    <div class="container">
      @yield('content')
    </div>
    
    
</body>
    

<!-- Optional JavaScript -->
<script>
    window.addEventListener('load', function() {
        var navUl = document.getElementById('navUl');
        var navSpan = document.getElementById('navSpan');

        navUl.style.display = 'none';
        navSpan.addEventListener('mouseenter', function() {
            navUl.style.display = 'block';
        });
        navUl.addEventListener('mouseleave', function() {
            navUl.style.display = 'none';
        });
        
        navSpan.addEventListener('mouseleave', function() {
            setTimeout(function() {
                if (!isHover(navUl)) {
                    navUl.style.display = 'none';
                }
            }, 3000);
        });
      
        function isHover(elem) {
            return (elem.parentElement.querySelector(':hover') === elem);
        }
    });
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script>
function myFunction() {
    if (!confirm("Are You Sure to logout"))
        event.preventDefault();
}

$('.type_nep').on('keyup',function(){
var code = $(this).val();
    $(this).val(convert_to_unicode(code));
})
</script>


</html>