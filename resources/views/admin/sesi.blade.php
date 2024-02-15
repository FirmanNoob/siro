@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Riwayat Pelatihan Saya</h4>

    <div class="row mb-5">
        <div class="col-md-6 col-xl-6">
            <div class="card mb-3">
                <img class="card-img-top" src="{{ asset('gambar-pelatihan/'.$sesiPelatihan->gambar) }}" width="500" height="500" alt="Card image cap">
                <div class="card-body">
                    <div class="row">
                        <div class="card-title col-sm-4 text-left">{{$sesiPelatihan->tanggal_awal->format('l, d-M-Y')}}</div>
                        <div class="col-sm-4 text-center">{{$sesiPelatihan->waktu_mulai}} - {{ $sesiPelatihan->waktu_berakhir }}</div>
                        <div class="col-sm-4 text-end"><i class='bx bxs-location-plus'></i> {{$sesiPelatihan->lokasi}}</div>
                    </div>
                    <h5 class="card-text mt-3">
                        {{ $sesiPelatihan->nama_Pelatihan }}
                    </h5>
                    <p class="card-text">
                        {{ $sesiPelatihan->deskripsi }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="card bg-primary text-white mb-3">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title text-white">Primary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection