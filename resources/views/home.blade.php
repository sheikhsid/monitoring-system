@extends('layouts.app')

@section('content')

@if (Auth::user()->role_as == '7')
    <script>window.location = "/admin";</script>
@endif

<div class="page-content">
                <section class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="row align-items-center">
                        @foreach($rooms as $room) 
                            <div class="col-12 col-md-4">
                                <div class="card">
                                    <a href="/room/{{$room['id']}}" class="pop">
                                        <div class="card-body" style="text-align: center;">
                                            <h5> {{$room['room']}} </h5> </br>
                                            <h6>No. of Student {{$room['nos']}}</h6>
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
