@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Riwayat Pelatihan Saya</h4>

    <div class="row mb-5">
        @foreach(auth()->user()->trainings as $data)
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="card-img card-img-left" src="{{ asset('gambar-pelatihan/'.$data->pelatihan->gambar) }}" alt="Card image" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->pelatihan->nama_Pelatihan }} <br><span class="text-muted fw-light mb-3">Lokasi : {{ $data->pelatihan->lokasi }}</span></h5>
                            <p class="card-text">
                                Jadwal : {{ $data->pelatihan->tanggal_awal->format('l, d-M-Y') }} - {{ $data->pelatihan->tanggal_berakhir->format('l, d-M-Y') }}
                            </p>
                            <p class="card-text">
                                <a href="{{ $data->pelatihan->link }}">Klik Disini</a>
                            </p>
                            <p><b>Harga :</b> Gratis</p>
                            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                            <a href="pelatihanUserSesi/{{$data->pelatihan->id}}" class="btn rounded-pill btn-primary">Detail</a>
                            <!-- <a href="{{ route('downloadCertificate', ['userId' => auth()->user()->id, 'trainingId' => $data->pelatihan_id]) }}" class="btn btn-primary">Download Sertifikat</a> -->
                            @if ($data->is_approved)
                            <a href="{{ route('downloadCertificate', ['userId' => $data->user_id, 'trainingId' => $data->pelatihan_id]) }}" class="btn btn-success">Download Sertifikat</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection