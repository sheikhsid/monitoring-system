@extends('layouts.app')

@section('content')



@if (Auth::user()->role_as == '7')
    <script>window.location = "/admin";</script>
@endif

<div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-2">
                        @foreach($roomdata as $roomdata) 
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="font-bold">{{$roomdata['institute']}}</h5>
                                        <h6>{{$roomdata['room']}}</h6>
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
                                        <h5 class="mb-1">
                                            <a href="{{"/view/".$student['id']}}">{{$student['student_name']}}</a>
                                        </h5>
                                        <h6 class="text-muted mb-0">{{$student['ip_address']}}</h6>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-10">
                        <div class="row">
                        @foreach($students as $student) 
                            <div class="col-12 col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <iframe src="http://{{$student['ip_address']}}:80" title="" width="100%" height="250"></iframe>
                                        <h5><a href="{{"/view/".$student['id']}}">{{$student['student_name']}}</a></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach                        
                        </div>
                    </div>
                </section>
            </div>

@endsection
