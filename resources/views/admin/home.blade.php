@extends('layouts.app')




<div id="app" class="admin">
<x-sidebar />
        <div id="main"> 
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Monitoring System</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <a href="/admin/schools">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="stats-icon purple">
                                                        <i class="iconly-boldShow"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h6 class="text-muted font-semibold">Total Schools</h6>
                                                    <h6 class="font-extrabold mb-0">0{{ $usercount }}</h6>
                                                </div>
                                            </div>
                                        </a>
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
                                                <h6 class="text-muted font-semibold">Class Rooms</h6>
                                                <h6 class="font-extrabold mb-0">0{{ $roomcount }}</h6>
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
                                                <h6 class="text-muted font-semibold">Active Students</h6>
                                                <h6 class="font-extrabold mb-0">0{{ $studentcount }}</h6>
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
                                                <h6 class="text-muted font-semibold">My IP Address</h6>
                                                <h6 class="font-extrabold mb-0">{{$clientIP = request()->ip();}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Room Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>School Name</th>
                                                        <th>Room Name</th>
                                                        <th>Created Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($rooms as $room)
                                                    <tr>
                                                        <td class="col-auto">{{$room['room']}}</td>
                                                        <td class="col-auto">
                                                            @foreach($users as $user)
                                                            @if ($room['school'] == $user['id'])
                                                            {{$user['name']}}
                                                            @else
                                                            @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="col-3">{{$room['created_at']}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>List of Schools</h4>
                            </div>
                            <div class="card-content pb-4">
                            @foreach($users as $user)
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar-lg">
                                        <i class="bi bi-building" style="font-size: 40px;"></i>
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1" title="{{$user['created_at']}}">{{$user['name']}}</h5>
                                        <h6 class="text-muted mb-0"><a href="mailto:{{$user['email']}}">{{$user['email']}}</a></h6>
                                    </div>   
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
