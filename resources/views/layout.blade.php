<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ajx -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--css-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

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
        $bg_image="/images/bg.png";
    }

    // ->where('client_id',Auth::user()->client_id)
    // ->select('image');
    // dd($background);

    ?>body {
        background-image: url({{$bg_image}});
        /* background-color: #cccccc; */
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #29558b; color: #fff;">
        <a class="navbar-brand nav-text1" href="#">Client <span>Portal App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link scrollto active" href="{{route('homes.index')}}">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                
                
                <li class="nav-item">
                    <a class="nav-link scrollto" href="{{route('background.create')}}">BG Image</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scrollto" href="{{route('urls.index')}}">URl List</a>
                </li>
                @can('view')
                <li class="nav-item">
                    <a class="nav-link scrollto" href="{{route('apps.index')}}">Apps List</a>
                </li>
                
                
                <li class="nav-item">
                    <a class="nav-link scrollto" href="{{route('applications.index')}}">Applications</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link scrollto" href="{{route('roles.index')}}">Roles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scrollto" href="{{route('permission.index')}}">Permission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scrollto" href="{{route('users.index')}}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scrollto" href="{{route('map.index')}}">UrlMap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scrollto" href="{{ url('/register') }}">Register</a>
                </li>
                @endcan
               
            </ul>
        </div>

        <div class="ml-auto">
            <a class="nav-link scrollto">
                <h5> {{ $user = auth()->user()->name; }}</h5> <span class="caret"></span>
        </div>

        <div class="mx-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" href="route('logout')" onclick="return myFunction();"
                    class="btn btn-outline-light">
                    <i class="fa fa-sign-out " aria-hidden="true"></i>
                    <span class=" d-sm-none d-md-inline-block">बाहिर जाने</span></button>

                <!-- <a href="route('logout')"
        onclick="event.preventDefault();
        this.closest('form').submit();">
        {{ __('Log Out') }}
      </a> -->
            </form>
        </div>

    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>



<!-- <img src="/images/bgimage.webp" alt="Bg Image" /> -->


<!-- Optional JavaScript -->
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