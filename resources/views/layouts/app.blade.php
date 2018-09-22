<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MagDown Magazines</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy" rel="stylesheet">

    {{--Font content--}}
    <link href="https://fonts.googleapis.com/css?family=Istok+Web" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
</head>
<body id="app-layout">
    <nav class="navbar navbar2 navbar-inverse navbar-static-top">
        <div class="container max-w">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand logo" href="{{ url('/') }}">
                    magdown
                </a>
            </div>

            <div class="collapse navbar-collapse down-20" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/my-magazines') }}">My magazines</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <!-- Right Side Of Navbar -->
                <form class="navbar-form navbar-right" method="get" action="{{url('search-results')}}">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control search_field" @if(isset($search)) value="{{$search}}" @else placeholder="Search" @endif>
                    </div>
                    <button type="submit" class="btn btn-default"> <i class="fa fa-search"></i> </button>
                </form>


            </div>
        </div>
    </nav>
    <nav class="navbar navbar-inverse" style="border-radius: 0!important;">
        <div class="container max-w">
            <ul class="nav navbar-nav">
                <li  @if(isset($active)) @if($active === 'all') class="active" @endif @endif><a href="{{url('/')}}">All <span class="sr-only">(current)</span></a></li>
                @foreach(\App\Language::all() as $lang)
                    <li @if(isset($active)) @if($active === $lang->name) class="active" @endif @endif><a href="{{url('/show-language/'.$lang->name)}}" style="text-transform: capitalize">{{$lang->name}}</a></li>
                @endforeach
                <li class="dropdown  @if(isset($active)) @if($active === 'category') active @endif @endif">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach(\App\Category::all() as $category)
                            <li><a href="{{url('/show-category/'.$category->name)}}" style="text-transform: capitalize">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

    @yield('content')


    <footer>
        <div class="container max-w">
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <p class="text-white">
                        Copyright © 2018 <span class="logo-footer">Magdown</span>
                        All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/jquery.jscroll.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>



</body>
</html>
