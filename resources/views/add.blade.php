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
                        <div class="row">
                        
                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Add New Student</h5><br>
                                        <form action="/monitoring-system/public/add" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Student Name*</label>
                                                    <input type="text" class="form-control" name="student_name" placeholder="Enter the Student Name...">  
                                                    <div class="invalid-feedback"> @error('student_name'){{$message}}@enderror </div>                                      
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>IP Address*</label>
                                                    <input type="text" class="form-control" name="ip_address" placeholder="127.05.80.16" >
                                                    <div class="invalid-feedback"> @error('ip_address'){{$message}}@enderror </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                                    </div>
                                </div>
                            </div>                      
                        </div>
                    </div>
                </section>
            </div>

@endsection
