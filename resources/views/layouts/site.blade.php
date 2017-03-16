<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Web Site</title>
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>

    </script>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('/css/site.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<div id="app">
    <div class="navbar-fixed">
        <nav class="white" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="{{route('site.index')}}" class="brand-logo">Site</a>
                <ul class="right hide-on-med-and-down">
                    @include('site._links')
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    @include('site._links')
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
    </div>

    @yield('content')

   <chat></chat>

    <footer class="page-footer teal">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Company Bio</h5>
                <p class="grey-text text-lighten-4">
                    We are a team of college students working on this project like it's our full time job.
                    Any amount would help support and continue development on this project and is greatly appreciated.
                </p>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Settings</h5>
                <ul>
                    <li><a class="white-text" href="{{url('api')}}">Login</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                    <li><a class="white-text" href="#!">Link 3</a></li>
                    <li><a class="white-text" href="#!">Link 4</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="white-text" href="{{route('site.index')}}">Home</a> </li>
                    <li><a class="white-text" href="{{route('site.services.index')}}">Services</a></li>
                    <li><a class="white-text" href="{{route('site.products.index')}}">Products</a></li>
                    <li><a class="white-text" href="{{route('site.contacts.index')}}">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            by <a class="brown-text text-lighten-3" href="mailto:dev_carlos@outlook.com">Carlos Andrade</a>
        </div>
    </div>
</footer>

</div>
<!--  /div app-->


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{asset('/js/materialize.min.js')}}"></script>
<script src="{{asset('/js/main.js')}}"></script>
<script src="{{asset('/js/site/init.js')}}"></script>

</body>
</html>

