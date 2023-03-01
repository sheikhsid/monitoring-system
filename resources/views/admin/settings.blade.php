@extends('layouts.app')
<div id="app" class="admin">
    <x-sidebar />
    <div id="main">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>All Settings</h3>
                            <p class="text-subtitle text-muted">All Globel and Email Settings</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Settings</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                    @if ($settings['user_id'] == Auth::user()->id)
                                    <form action="/admin/setting" method="POST">
                                        @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Plateform</label>
                                                        <input type="hidden" value="{{ $settings['id'] }}" name="id" required>
                                                        <input type="text" id="email-id-column" class="form-control" value="{{ $settings['name'] }}" name="name" required>
                                                        @error('room'){{$message}}@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Sector</label>
                                                        <input type="text" id="email-id-column" class="form-control" value="{{ $settings['school'] }}" name="school" required>
                                                        @error('room'){{$message}}@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Groups</label>
                                                        <input type="text" id="email-id-column" class="form-control" value="{{ $settings['room'] }}" name="room" required>
                                                        @error('room'){{$message}}@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Participants</label>
                                                        <input type="text" id="email-id-column" class="form-control" value="{{ $settings['student'] }}" name="student" required>
                                                        @error('room'){{$message}}@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                    <label>Badge on top (show in Sector's Profile)</label>
                                                    <select class="form-control" name="dateortime" required>
                                                        <option value="0">Only Date</option>
                                                        <option value="1">Only Time</option>
                                                        <option value="2">Both Date & Time</option>
                                                    </select>
                                                    @error('institute'){{$message}}@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Participants List</label>
                                                        <input type="text" id="email-id-column" class="form-control" value="{{ $settings['list_name'] }}" name="list_name" required>
                                                        @error('room'){{$message}}@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-10 col-12">
                                                    <div class="form-group">
                                                        <label>Footer Copyrights</label>
                                                        <input type="text" id="email-id-column" class="form-control" value="{{ $settings['copyrights'] }}" name="copyrights" required>
                                                        @error('room'){{$message}}@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="form-group"></br>
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                    <form action="/admin/settings" method="POST">
                                        @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Plateform</label>
                                                        <input type="text" id="email-id-column" class="form-control" value="Plateform Name" name="name" required>
                                                        @error('room'){{$message}}@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Sector</label>
                                                        <input type="text" id="email-id-column" class="form-control" value="Sector" name="school" required>
                                                        @error('room'){{$message}}@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Groups</label>
                                                        <input type="text" id="email-id-column" class="form-control" value="Groups" name="room" required>
                                                        @error('room'){{$message}}@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Participants</label>
                                                        <input type="text" id="email-id-column" class="form-control" value="Participants" name="student" required>
                                                        @error('room'){{$message}}@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                    <label>Badge on top (show in Sector's Profile)</label>
                                                    <select class="form-control" name="dateortime" required>
                                                        <option value="0">Only Date</option>
                                                        <option value="1">Only Time</option>
                                                        <option value="2">Both Date & Time</option>
                                                    </select>
                                                    @error('institute'){{$message}}@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Participants List</label>
                                                        <input type="text" id="email-id-column" class="form-control" value="List of all Participants" name="list_name" required>
                                                        @error('room'){{$message}}@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-10 col-12">
                                                    <div class="form-group">
                                                        <label>Footer Copyrights</label>
                                                        <input type="text" id="email-id-column" class="form-control" value="Company" name="copyrights" required>
                                                        @error('room'){{$message}}@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-12">
                                                    <div class="form-group"></br>
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Install</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>