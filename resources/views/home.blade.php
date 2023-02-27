@extends('layouts.app')

@section('content')

@if (Auth::user()->role_as == '7')
    <script>window.location = "/admin";</script>
@endif

<div class="page-content">
                <section class="row justify-content-center">
                @foreach($rooms as $room) 
                    <div class="col-12 col-md-10">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <iframe src="" title="" width="100%" height="250"></iframe>
                                        <h5><a href=""> {{$room['room']}} </a></h5>
                                    </div>
                                </div>
                            </div>               
                        </div>
                    </div>
                @endforeach
                </section>
            </div>

@endsection
