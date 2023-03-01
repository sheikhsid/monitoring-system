@extends('layouts.app')
<div id="app" class="admin">
    <x-sidebar />
    <div id="main">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>All {{ $settings['room'] }} in {{ $school['name'] }}</h3>
                            <p class="text-subtitle text-muted">List of added {{ $settings['room'] }}</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/admin/schools">All {{ $settings['school'] }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">View {{ $settings['school'] }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="row">
                            <div class="col-12 col-xl-12">
                            <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>{{ $settings['room'] }} Name</th>
                                                        <th>Created Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($rooms as $room)
                                                    <tr>
                                                        <td class="col-3">{{$room['room']}}</td>
                                                        <td class="col-auto">{{$room['created_at']}}</td>
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
                    </div>
                </section>
            </div>
        </div>