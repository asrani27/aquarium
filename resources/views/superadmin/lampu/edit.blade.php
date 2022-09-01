@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush
@section('title')
EDIT JADWAL LAMPU
@endsection
@section('content')
<br />
<div class="row">
    <div class="col-12">
        <form method="post" action="/lampu/edit/{{$data->id}}">
            @csrf
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">EDIT JADWAL LAMPU AQUARIUM</h3>
                            <div class="card-tools">
                                <a href="/lampu" type="button" class="btn bg-gradient-secondary btn-sm">
                                    <i class="fa fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lighting 1 Time</label>
                                <div class="col-sm-2">
                                    <input type="time" class="form-control" name="light1_start"
                                        value="{{$data->light1_start}}" required min="00:00" max="23:59">
                                </div>
                                <label class="col-sm-1 col-form-label">Sampai</label>
                                <div class="col-sm-2">
                                    <input type="time" class="form-control" name="light1_end"
                                        value="{{$data->light1_end}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-block bg-gradient-secondary"><strong><i
                                                class="fa fa-save"></i> UPDATE</strong></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('js')

@endpush