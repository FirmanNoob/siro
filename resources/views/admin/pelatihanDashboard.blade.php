@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title text-dark col-sm-6 text-left">{{ $data->nama_Pelatihan}}</h5>
                                <a href="#" class="col-sm-4"> </a>
                                <a href="{{ route('pelatihan') }}" class="col-sm-6 btn rounded-pill btn-outline-primary text-primary ml-auto small-btn" style="width: auto; height: 40px; mix-blend-mode:hard-light;"><i class='bx bx-left-arrow-alt'></i> Kembali</a>
                            </div>

                            <div class="row mt-4">
                                <div class="card-title col-sm-3 text-left text-primary"><i class='bx bx-calendar-event' style='color:#2500ff'></i> {{$data->tanggal_awal->format('l, d-M-Y')}}</div>
                                <div class="col-sm-3 text-center text-primary"><i class='bx bxs-time-five' style='color:#2500ff'></i> {{$data->waktu_mulai}} - {{ $data->waktu_berakhir }}</div>
                                <div class="col-sm-3 text-end text-primary"><i class='bx bxs-location-plus' style='color:#2500ff'></i> {{$data->lokasi}}</div>
                            </div>
                            <p class="mb-4">
                                {{ $data->deskripsi }}
                            </p>
                            <button type="button" class="btn rounded-pill btn-outline-primary text-primary"><i class='bx bxs-user' style='color:#2500ff'></i> Peserta</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title text-dark col-sm-6 text-left">Peserta</h5>
                                <!-- <a href="#" class="col-sm-4"> </a>
                                <a href="#" class="col-sm-6 btn rounded-pill btn-outline-primary text-primary ml-auto small-btn" style="width: auto; height: 40px; mix-blend-mode:hard-light;"><i class='bx bx-left-arrow-alt'></i> Kembali</a> -->
                            </div>

                            <div class="table-responsive text-nowrap">
                                <table class="table card-table">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Sertifikat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach($pesertas as $peserta)
                                        <tr class="table-secondary">
                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> {{ $peserta->user->name }}</td>
                                            <td>{{ $peserta->user->email }}</td>
                                            <td>
                                                @if (!$peserta->is_approved)
                                                <form method="post" action="{{ route('approveAndGenerateCertificate', ['userId' => $peserta->user_id, 'trainingId' => $peserta->pelatihan_id]) }}">
                                                    @csrf
                                                    <button class="btn btn-primary" type="submit">Approve</button>
                                                </form>
                                                @endif
                                            </td>
                                            <td>Albert Cook</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection