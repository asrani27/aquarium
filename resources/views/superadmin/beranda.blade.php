@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
@endpush
@section('title')
<strong>BERANDA</strong>
@endsection
@section('content')
<br />
<div class="row">
    <div class="col-lg-12">
        @if ($tinggi < 10)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            Buzzer Nyala
          </div>
        @else
            
        @endif
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <img class="img-circle" src="/admin/dist/img/avatar5.png" alt="User Image">
                    <span class="username"><a href="#">Hi, {{Auth::user()->name}}</a></span>
                    <span class="description">SELAMAT DATANG DI APLIKASI AKUARIUM CERDAS</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$suhu}}<sup style="font-size: 20px">O</sup> C</h3>

                <p>TEMPERATUR SUHU</p>
            </div>
            <div class="icon">
                <i class="fas fa-water"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$tinggi}}%</h3>

                <p>KETINGGIAN AIR</p>
            </div>
            <div class="icon">
                <i class="fas fa-water"></i>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fa fa-fan"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">KIPAS</span>
                <span class="info-box-number">{{$kipas == 0 ? 'MATI' : 'NYALA'}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-6 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="fas fa-lightbulb"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">LAMPU</span>
                <span class="info-box-number">{{$lampu}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>
{{-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">PAKAN IKAN</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservationtime"
                                value="{{$pakan->food1}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservationtime"
                                value="{{$pakan->food2}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservationtime"
                                value="{{$pakan->food3}}">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div> --}}
@endsection

@push('js')

@endpush