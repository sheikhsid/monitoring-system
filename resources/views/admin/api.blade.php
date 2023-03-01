@extends('layouts.app')
<div id="app" class="admin">
    <x-sidebar />
    <div id="main">
        <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>API Details</h3>
                            <p class="text-subtitle text-muted">List of live APIs</p>
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
                                                        <th>Roles</th>
                                                        <th>API URLs</th>
                                                        <th>Method</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="col-3">Get All {{ $settings['school'] }}</td>
                                                        <td class="col-auto">https://{{ Request::getHost() }}/api/school/</td>
                                                        <td class="col-2">GET</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">Get One {{ $settings['school'] }} with All {{ $settings['room'] }}</td>
                                                        <td class="col-auto">https://{{ Request::getHost() }}/api/school/id</td>
                                                        <td class="col-2">GET</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">{{ $settings['student'] }} On</td>
                                                        <td class="col-auto">https://{{ Request::getHost() }}/api/students/add</td>
                                                        <td class="col-2">POST</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">Get Active {{ $settings['student'] }}</td>
                                                        <td class="col-auto">https://{{ Request::getHost() }}/api/students/</td>
                                                        <td class="col-2">GET</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">{{ $settings['student'] }} Off</td>
                                                        <td class="col-auto">https://{{ Request::getHost() }}/api/students/id</td>
                                                        <td class="col-2">DELETE</td>
                                                    </tr>
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