@extends('layouts.app')

@section('content')

<div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>{{$data['student_name']}} <br><br><span style="font-size: 15px;">{{$data['ip_address']}}</span>
                                        <i class="date">{{$data['created_at']}}</i>
                                        </h5></br>
                                        <iframe src="http://{{$data['ip_address']}}:80" title="" width="100%" height="850"></iframe>
                                    </div>
                                </div>
                            </div>                     
                        </div>
                    </div>
                </section>
            </div>
@endsection
  