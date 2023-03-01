@extends('layouts.app')
<div id="app" class="admin">
    <x-sidebar />
    <div id="main">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>All {{ $settings['room'] }}</h3>
                            <p class="text-subtitle text-muted">Add new {{ $settings['room'] }} and see the list of Added {{ $settings['room'] }}</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All {{ $settings['room'] }}</li>
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
                                                <div class="col-md-5 col-12">
                                                    <div class="form-group">
                                                        <input type="text" id="email-id-column" class="form-control" placeholder="{{ $settings['room'] }} Name" name="room" required>
                                                        @error('room'){{$message}}@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-12">
                                                    <div class="form-group">
                                                    <select class="form-control" name="school" required>
                                                        <option value="" class="none">Select {{ $settings['school'] }}</option>
                                                        @foreach($users as $user)
                                                        <option value="{{$user['id']}}">{{$user['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('institute'){{$message}}@enderror
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
                                                        <th>{{ $settings['room'] }} Name</th>
                                                        <th>{{ $settings['school'] }} Name</th>
                                                        <th>Active {{ $settings['student'] }}</th>
                                                        <th>Created Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($rooms as $room)
                                                    <tr>
                                                        <td class="col-auto">{{$room['room']}}</td>
                                                        <td class="col-auto">
                                                            @foreach($users as $user)
                                                            @if ($room['school'] == $user['id'])
                                                            <a href="/admin/school-rooms/{{$user['id']}}">{{$user['name']}}</a>
                                                            @else
                                                            @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="col-2" style="padding-left: 60px;">0{{ $students->where('room_id', $room['id'])->count() }}</td>
                                                        <td class="col-2">{{$room['created_at']}}</td>
                                                        <td class="col-1">
                                                        <a href="/room/{{$room['id']}}" target="_blank" style="margin-right: 10px;"><i class="bi bi-eye"></i></a>
                                                        <a href="/admin/room/{{$room['id']}}"><i class="bi bi-trash"></i></a>
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