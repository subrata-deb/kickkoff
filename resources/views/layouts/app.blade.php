<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Website: @yield('title')</title>
    <link rel="stylesheet" href="{{URL::to('src/main.css')}}">
    
    
    
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

    <!-- Jquery and javascript integrate using the following link / use after yield(content)  -->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="{{ URL::to('src/js/app.js') }}"></script>


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