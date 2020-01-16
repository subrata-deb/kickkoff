<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Website: @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    
</head>
<body>
    @include('include.navbar')
    

    <div class="container">

        @if(Request::is("/"))
        @include('include.showcase')
        @endif

        <div class="row">
            <div class="col-md-8 col-lg-8">
                @include('include.error-messages')
                @yield('content')
            </div>
    
            <div class="col-md-4 col-lg-4">
                @include('include.sidebar')
            </div>
        </div>
    </div>
    
    <footer id="footer" class="text-center" >
        <p>Copyright 2020 &copy; Subrata</p>
    </footer>
</body>
</html>