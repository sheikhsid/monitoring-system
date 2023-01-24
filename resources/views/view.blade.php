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

<body>
    <div id="app">
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @foreach($roomdata as $roomdata) 
            <div class="page-heading">
            <h3 class="logo"><img src="{{ url('/images/logo/logo.png') }}"><span><a href="/monitoring-system/public/">{{$roomdata['room']}}</a></span></h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ url('/images/faces/1.jpg') }}" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">{{$roomdata['tutor']}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="card">
                            <div class="card-header">
                                <h4>List Of Students ({{ $countstudents }})</h4>
                            </div>
                            <div class="card-content pb-4">
                            @foreach($students as $student) 
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="{{ url('/images/faces/4.jpg') }}">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1"><a href="{{"/monitoring-system/public/view/".$student['id']}}">{{$student['student_name']}}</a></h5>
                                        <h6 class="text-muted mb-0">{{$student['ip_address']}}</h6>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>{{$data['student_name']}} <br><br><span style="font-size: 15px;">{{$data['ip_address']}}</span></h5></br>
                                        <iframe src="http://{{$data['ip_address']}}:80" title="" width="100%" height="563"></iframe>
                                    </div>
                                </div>
                            </div>                     
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>Immensive Monitoring System</p>
                    </div>
                    <div class="float-end">
                        <p>All Rights Reserved by <a href="#">Immensive</a>.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>