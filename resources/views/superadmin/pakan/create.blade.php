@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush
@section('title')

@endsection
@section('content')
<br />
<div class="row">
    <div class="col-12">
        <form method="post" action="/pakan/create">
            @csrf
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">TAMBAH JADWAL PAKAN</h3>
                            <div class="card-tools">
                                <a href="/pakan" type="button" class="btn bg-gradient-secondary btn-sm">
                                    <i class="fa fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Food 1</label>
                                <div class="col-sm-2">
                                    <input type="time" class="form-control" name="food1" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Food 2</label>
                                <div class="col-sm-2">
                                    <input type="time" class="form-control" name="food2" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Food 3</label>
                                <div class="col-sm-2">
                                    <input type="time" class="form-control" name="food3" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-block bg-gradient-secondary"><strong><i
                                                class="fa fa-save"></i> SIMPAN</strong></button>
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