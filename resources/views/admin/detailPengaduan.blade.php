@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Detail Pengaduan</h4>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3">
            <img class="card-img-top" src="{{ asset('gambar-pengaduan/'.$pengaduan->gambar) }}" alt="Card image cap">
                <div class="card-body">
                      <h5 class="card-title">Laporan : {{ $pengaduan->laporan }}</h5>
                      <p class="card-text">
                        Status : @if($pengaduan->status == 'Sedang Diverifikasi')
                            <span class="badge bg-warning"> Sedang Diverifikasi</span>
                            @elseif($pengaduan->status === 'Selesai Diverifikasi')
                            <span class="badge bg-success">Selesai Diverifikasi</span>
                          @endif
                      </p>
                      <p class="card-text">
                        Tanggapan : <span class="text-success">{{ $pengaduan-> tanggapan}}</span>
                      </p>
                      <!-- <p class="card-text">
                        <small class="text-muted">Last updated 3 mins ago</small>
                      </p> -->
                      <p class="card-text">Tgl Pengaduan : {{ $pengaduan->created_at->format('l, d-M-Y') }}</p>
                      <p class="card-text">
                        @if($pengaduan->response_at)
                        Tgl Tanggapan : {{ $pengaduan->response_at->format('l, d-M-Y') }}
                        @else
                        N/A or Any Default Value
                        @endif  
                    </p>
                </div>
        </div>
    </div>
</div>
@endsection