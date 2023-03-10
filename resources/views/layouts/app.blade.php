<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Weld Monitoring System</title>
        <!-- PWA  -->
        <meta name="theme-color" content="#1f262e"/>
        <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
        <link rel="manifest" href="{{ asset('/manifest.json') }}">


        <link rel="stylesheet" href="{{ asset('/vendors/iconly/bold.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendors/bootstrap-icons/bootstrap-icons.css') }}">


        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    </head>

    <body style="background-image: url({{ asset('/images/background.jpg') }});">
            <div id="main">         
                <div class="page-heading school">
                    <h3 class="logo"><a href="/home"><img src="{{ asset('/images/logo/logo.png') }}"></a>
                    @if (Auth::check())
                    <span>
                        <ul>
                            <li style="background: #12171abf;">{{ \Carbon\Carbon::now()->toDateString() }} </li>
                            <li><a href="/home">Home</a></li>
                            <li><a href="/logout">Logout</a></li>
                        </ul>
                    </span>
                    @elseif (Auth::guest())
                        <span></span>
                    @endif
                    </h3>
                </div>


            <main class="py-4">
                @yield('content')
            </main>
        
            <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>Weld Monitoring System</p>
                        </div>
                        <div class="float-end">
                            <p>All Rights Reserved by <a href="https://{{ Request::getHost() }}" target="_blank">Immensive</a>.</p>
                           
                        </div>
                    </div>
                </footer>
            </div>
            
        <script src="{{ asset('/sw.js') }}"></script>
        <script>
            if (!navigator.serviceWorker.controller) {
                navigator.serviceWorker.register("/sw.js").then(function (reg) {
                    console.log("Service worker has been registered for scope: " + reg.scope);
                });
            }
        </script>
    </body>
</html>