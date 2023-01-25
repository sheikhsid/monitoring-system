@extends('layouts.app')

@section('content')

<div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-3">
                        @foreach($roomdata as $roomdata) 
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ url('/images/faces/1.jpg') }}" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
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
                                            <a href="{{"/monitoring-system/public/view/".$student['id']}}">{{$student['student_name']}}</a>
                                            <a href="{{"/monitoring-system/public/delete/".$student['id']}}"><img src="{{ url('/images/icon/trash.png') }}" alt="trash"></a>
                                        </h5>
                                        <h6 class="text-muted mb-0">{{$student['ip_address']}}</h6>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="row" style="display:none;">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total Students</h6>
                                                <h6 class="font-extrabold mb-0">112.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total Students</h6>
                                                <h6 class="font-extrabold mb-0">183.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Online Students</h6>
                                                <h6 class="font-extrabold mb-0">80.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Online Students</h6>
                                                <h6 class="font-extrabold mb-0">112</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        @foreach($students as $student) 
                            <div class="col-12 col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <iframe src="http://{{$student['ip_address']}}:80" title="" width="100%" height="250"></iframe>
                                        <h5><a href="{{"/monitoring-system/public/view/".$student['id']}}">{{$student['student_name']}}</a></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach                        
                        </div>
                    </div>
                </section>
            </div>

@endsection