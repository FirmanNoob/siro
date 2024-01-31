@extends('layouts.master')
@php
$counter = 1;
@endphp
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Table Pelatihan Peserta</h4>

    <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Basic Layout</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('pengaduanCreate') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">Isi Laporan</label>
                          <div class="col-sm-10">
                            <textarea id="basic-default-message" name="laporan" class="form-control" placeholder="Isi Pengaduan Disini" rows="7" cols="30"></textarea>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Gambar</label>
                          <div class="col-sm-10">
                            <input type="file" name="gambar" id="formFil" class="form-control">
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
    <!-- Basic Bootstrap Table -->
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
                        @if($pengaduan->user_id === auth()->id())
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
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    <!--/ Basic Bootstrap Table -->
    @endsection