@extends('layouts.master')
@php
$counter = 1;
@endphp
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Table Pelatihan Peserta</h4>
    <div class="card">
        <!-- <h5 class="card-header">Table Basic</h5> -->
        <!-- <button type="button" class="btn btn-primary">Primary</button> --><!-- Button trigger modal -->
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-header">Table Basic</h5>
            </div>
            <div class="col-md-6 mt-4 text-end">
                <!-- <button type="button" class="btn btn-primary">Primary</button> -->
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                      <th>#</th>
                        <th>Nama</th>
                        <th>Isi Laporan</th>
                        <th>Tgl Melapor</th>
                        <th>Foto</th>
                        <th>Status</th>
                        @if(auth()->check() && auth()->user()->role === 'operator')
                        <th>Tanggapan</th>
                        @endif
                        <th>Lihat Detail</th>
                        <!-- <th>Deskripsi</th> -->
                        <!-- <th>Link</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($data as $pengaduan)
                    <tr>
                      <td>{{ $counter++ }}</td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{ $pengaduan->user->name }}</td>
                        <td>{{ $pengaduan->laporan }}</td>
                        <td>{{ $pengaduan->created_at->format('l, d-M-Y') }}</td>
                        <td><img src="{{ asset('gambar-pengaduan/'.$pengaduan->gambar) }}" alt="" width="100"></td>
                        <td>
                          @if($pengaduan->status == 'Sedang Diverifikasi')
                            <span class="badge bg-warning"> Sedang Diverifikasi</span>
                            @elseif($pengaduan->status === 'Selesai Diverifikasi')
                            <span class="badge bg-success">Selesai Diverifikasi</span>
                          @endif
                        </td>
                        @if(auth()->check() && auth()->user()->role === 'operator')
                        <td><a href="/tanggapan/{{$pengaduan->id}}" class="btn  btn-primary"><i class='bx bx-show-alt'></i></a></td>
                        @endif
                        <td><a href="/detailPengaduan/{{$pengaduan->id}}" class="btn  btn-primary"><i class='bx bx-show-alt'></i></a></td>
                        <td>
                            <a href="#" class="btn rounded-pill btn-primary">Update</a>
                            <a href="#" class="btn rounded-pill btn-danger">delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection