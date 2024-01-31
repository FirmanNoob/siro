@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Form Pelatihan</h5>
                <small class="text-muted float-end">Pelatihan Detail</small>
            </div>
            <div class="card-body">
                <form action="{{ route('pelatihan.tambah-proses') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Pelatihan</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <!-- <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span> -->
                                <input type="text" class="form-control" name="nama_Pelatihan" id="basic-icon-default-fullname" placeholder="Nama Pelatihan" aria-label="Nama Pelatihan" aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Lokasi</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <!-- <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span> -->
                                <input type="text" id="basic-icon-default-company" name="lokasi" class="form-control" placeholder="Lokasi" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Tanggal Awal</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="datetime-local" name="tanggal_awal" id="html5-datetime-local-input">
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Tanggal Berakhir</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="datetime-local" name="tanggal_berakhir" id="html5-datetime-local-input">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Waktu Mulai</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <!-- <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span> -->
                                <input class="form-control" type="time" name="waktu_mulai" value="12:30:00" id="html5-time-input">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Waktu Berakhir</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <!-- <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span> -->
                                <input class="form-control" type="time" name="waktu_berakhir" value="12:30:00" id="html5-time-input">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Limit Peserta</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" name="kouta" value="18" id="html5-number-input">
                            </div>
                        </div>
                    </div> -->
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Gambar</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <!-- <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span> -->
                                <input class="form-control" type="file" name="gambar" id="formFile">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 form-label" for="basic-icon-default-message">Deskripsi</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <!-- <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span> -->
                                <textarea id="basic-icon-default-message" name="deskripsi" class="form-control" placeholder="Deskripsi" aria-label="Deskripsi" aria-describedby="basic-icon-default-message2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Link</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <!-- <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span> -->
                                <input type="text" id="basic-icon-default-company" name="link" class="form-control" placeholder="link" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" />
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