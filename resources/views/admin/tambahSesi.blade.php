@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Sesi Table</h4>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Form Sesi</h5>
                <small class="text-muted float-end">Pelatihan Detail</small>
            </div>
            <div class="card-body">
                <form action="{{ route('sesipelatihan.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="pelatihan_id" value="{{ $data->id }}">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Sesi Pelatihan</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="namasesi" id="basic-icon-default-fullname" placeholder="Nama Pelatihan" aria-label="Nama Pelatihan" aria-describedby="basic-icon-default-fullname2" />
                            </div>
                            @error('namasesi')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Tanggal</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="datetime-local" name="tanggal" id="html5-datetime-local-input">
                            </div>
                            @error('tanggal')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Waktu Mulai</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="time" name="waktuMulai" id="html5-time-input" timezone="Asia/Jakarta" step="60">
                            </div>
                            @error('waktuMulai')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Waktu Berakhir</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="time" name="waktuBerakhir" id="html5-time-input" timezone="Asia/Jakarta">
                            </div>
                            @error('waktuBerakhir')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-message">Deskripsi</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <textarea id="basic-icon-default-message" name="deskripsi" class="form-control" placeholder="Deskripsi" aria-label="Deskripsi" aria-describedby="basic-icon-default-message2"></textarea>
                            </div>
                            @error('deskripsi')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Link</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-icon-default-company" name="link" class="form-control" placeholder="link" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                                @error('link')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection