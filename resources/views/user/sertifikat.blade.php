@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Sertifikat Saya</h4>

    <div class="row mb-5">
        @foreach(auth()->user()->trainings as $data)
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="card-img card-img-left" src="{{ asset('certificateSVG.png') }}" alt="Card image" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p><small>ID Sertifikat :</small></p>
                            <h5 class="card-title">{{ $data->pelatihan->nama_Pelatihan }} </h5>
                            <div class="row justify-content-between col-md-12">
                                <p class="card-text col-md-8">
                                    Jadwal : {{ $data->pelatihan->tanggal_awal->format('d-M-Y') }} - {{ $data->pelatihan->tanggal_berakhir->format('d-M-Y') }}
                                </p>
                                @if ($data->is_approved)
                                <a href="{{ route('downloadCertificate', ['userId' => $data->user_id, 'trainingId' => $data->pelatihan_id]) }}" class="col-auto btn btn-success text-center text-end">Download Sertifikat</a>
                                @else
                                <a href="#" class="col-auto btn btn-danger text-center text-end">Selesaikan Pelatihan</a>
                                @endif
                            </div>
                            <p><b>Harga :</b> Gratis</p>
                            <a href="pelatihanUserSesi/{{$data->pelatihan->id}}" class="btn rounded-pill btn-primary ml-auto">Detail</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection