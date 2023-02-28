@extends('layouts.app')

@section('content')

@if (Auth::user()->role_as == '7')
    <script>window.location = "/admin";</script>
@endif

<div class="page-content">
                <section class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <h1 class="welcome-heading">{{ Auth::user()->name }}</h1>
                        <div class="row align-items-center">
                        @foreach($rooms as $room) 
                            <div class="col-12 col-md-4">
                                <div class="card pop">
                                    <a href="/room/{{$room['id']}}">
                                        <div class="card-body" style="text-align: center;">
                                            <span class="active"> 0{{ $students->where('room_id', $room['id'])->count() }} </span>
                                        <img src="https://www.immensive.it/beta/wp-content/uploads/2023/02/weld_vr.png">
                                            <h5> {{$room['room']}} </h5> </br>
                                        </div>
                                    </a>
                                </div>
                            </div> 
                        @endforeach              
                        </div>
                    </div>
                </section>
            </div>

@endsection
