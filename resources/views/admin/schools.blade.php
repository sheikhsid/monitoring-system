@extends('layouts.app')
<div id="app" class="admin">
    <x-sidebar />
    <div id="main">
        <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>All {{ $settings['school'] }}</h3>
                            <p class="text-subtitle text-muted">List of registerd {{ $settings['school'] }}</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All {{ $settings['school'] }}</li>
                                    <li class="breadcrumb-item"><a href="/register" target="_blank">Add New</a></li>
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
                                                        <th>{{ $settings['school'] }} ID</th>
                                                        <th>{{ $settings['school'] }} Name</th>
                                                        <th>Email Address</th>
                                                        <th>Registration</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($users as $user)
                                                    <tr>
                                                        <td class="col-1 ">{{$user['id']}}</td>
                                                        <td class="col-3">{{$user['name']}}</td>
                                                        <td class="col-auto"><a href="mailto:{{$user['email']}}">{{$user['email']}}</a></td>
                                                        <td class="col-auto">{{$user['created_at']}}</td>
                                                        <td class="col-1">
                                                            <a href="/admin/school-rooms/{{$user['id']}}" style="margin-right: 10px;"><i class="bi bi-display"></i></a>
                                                            <a href="/admin/school/{{$user['id']}}"><i class="bi bi-trash"></i></a>
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