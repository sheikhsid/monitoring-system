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
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>All Rooms</h3>
                            <p class="text-subtitle text-muted">Add new Rooms and see the list of registerd rooms</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Rooms</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                    <form action="/admin/rooms" method="POST">
                                        @csrf
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <input type="text" id="email-id-column" class="form-control" placeholder="Room Name" name="room" required>
                                                        <div class="invalid-feedback"> @error('room'){{$message}}@enderror </div> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                    <select class="form-control" name="institute" required>
                                                        <option value="" class="none">Select School</option>
                                                        @foreach($users as $user)
                                                        <option value="{{$user['id']}}">{{$user['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback"> @error('institute'){{$message}}@enderror </div> 
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="form-group">
                                                        <input type="number" id="email-id-column" class="form-control" placeholder="Number of Students" name="nos" required>
                                                        <div class="invalid-feedback"> @error('nos'){{$message}}@enderror </div> 
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Room Name</th>
                                                        <th>School Name</th>
                                                        <th>Number of Students</th>
                                                        <th>Created Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($rooms as $room)
                                                    <tr>
                                                        <td class="col-3">{{$room['room']}}</td>
                                                        <td class="col-auto">
                                                            @foreach($users as $user)
                                                            @if ($room['school'] == $user['id'])
                                                            {{$user['name']}}
                                                            @else
                                                            @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="col-auto">{{$room['nos']}}</td>
                                                        <td class="col-auto">{{$room['created_at']}}</td>
                                                        <td class="col-auto">
                                                        <a href=""><i class="bi bi-stack"></i></a>
                                                        <a href=""><i class="bi bi-stack"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </section>
            </div>
        </div>