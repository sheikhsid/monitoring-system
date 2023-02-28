@extends('layouts.app')

@section('content')

<div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-lg">
                                        <i class="bi bi-building" style="font-size: 40px;position: relative;top: 10px;left: 10px;color: #54b5c5;"></i>
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="font-bold">
                                            @foreach($users as $user)
                                                @if ($room['school'] == $user['id'])
                                                    {{$user['name']}}
                                                @else
                                                @endif
                                            @endforeach    
                                        </h5>
                                        <h6>{{$room['room']}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Elenco degli studenti ({{ $countstudents }})</h4>
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
                    <div class="col-12 col-lg-9">
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
