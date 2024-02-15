@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Riwayat Pelatihan Saya</h4>

    <div class="row mb-5">
        <div class="col-md-6 col-xl-6">
            <div class="card mb-3">
                <img class="card-img-top" src="{{ asset('gambar-pelatihan/'.$pelatihan->gambar) }}" width="500" height="500" alt="Card image cap">
                <div class="card-body">
                    <div class="row">
                        <div class="card-title col-sm-4 text-left">{{$pelatihan->tanggal_awal->format('l, d-M-Y')}}</div>
                        <div class="col-sm-4 text-center">{{$pelatihan->waktu_mulai}} - {{ $pelatihan->waktu_berakhir }}</div>
                        <div class="col-sm-4 text-end"><i class='bx bxs-location-plus'></i> {{$pelatihan->lokasi}}</div>
                    </div>
                    <h5 class="card-text mt-3">
                        {{ $pelatihan->nama_Pelatihan }}
                    </h5>
                    <p class="card-text">
                        {{ $pelatihan->deskripsi }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            @if(count($pelatihan->sesiPelatihans) > 0)
            @foreach($pelatihan->sesiPelatihans as $sesi)
            <div class="card bg-primary text-white mb-3">
                <div class="card-header">{{ $sesi->namasesi }}</div>
                <div class="card-body">
                    <h5 class="card-title text-white">{{ $sesi->deskripsi }}</h5>
                    <div class="row col-md-12 ">
                        <div class="col-md-6 col-sm-6">
                            <p class="card-text"><i class='bx bxs-calendar-event'></i> {{ $sesi->tanggal->format('l, d-M-Y') }}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <p class="text-end"><i class='bx bxs-time'></i>{{ $sesi->waktuMulai }}</p>
                        </div>
                    </div>
                    <a href="{{ $sesi->link }}" class="btn btn-danger">Lihat Materi</a>
                </div>
            </div>
            @endforeach
            @else
            <div class="card bg-light text-dark mb-3">
                <div class="card-header">Sesi Belum Diisi</div>
                <div class="card-body">
                    <p class="card-text">Maaf, belum ada sesi pelatihan yang diisi.</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection