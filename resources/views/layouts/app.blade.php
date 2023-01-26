<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Immensive Monitoring System</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('/css/app.css') }}">
    <link rel="shortcut icon" href="{{ url('/images/favicon.svg') }}" type="image/x-icon">
</head>

<body style="background-image: url({{ url('/images/background.jpg') }});">
    <div id="app">
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3 class="logo"><a href="/monitoring-system/public/home"><img src="{{ url('/images/logo/logo.png') }}"></a>
                @if (Auth::check())
                <span>
                    <ul>
                        <li><a href="/monitoring-system/public/home">Home</a></li>
                        <li><a href="/monitoring-system/public/logout">Logout</a></li>
                    </ul>
                </span>
                        
                @endif
                @if (Auth::guest())
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
                        <p>Immensive Monitoring System</p>
                    </div>
                    <div class="float-end">
                        <p>All Rights Reserved by <a href="https://www.immensive.it/" target="_blank">Immensive</a>.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
