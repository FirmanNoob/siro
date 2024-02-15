@extends('layouts.master')
@php
$counter = 1;
@endphp
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Table Pelatihan Peserta</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-header">Table Basic</h5>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelatihan</th>
                        <th>Alasan Batalkan pelatihan</th>
                        <th>Tanggal Permintaan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($data as $pelatihan)
                    @if($pelatihan->user_id === auth()->id())
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{ $pelatihan->pelatihan->nama_Pelatihan }} </td>
                        <td>{{ $pelatihan->alasanPembatalan }}</td>
                        <td>tes</td>
                        <td><span class="badge rounded-pill bg-warning">{{ $pelatihan->status }}</span> </td>
                        <!-- <td><img src="{{ asset('gambar-pelatihan/'.$pelatihan->gambar) }}" alt="" width="100"></td>
                        <td>
                            <a href="pelatihan/{{$pelatihan->id}}/update" class="btn rounded-pill btn-primary">Update</a>
                            <a href="/pelatihan/{{$pelatihan->id}}/delete" class="btn rounded-pill btn-danger">delete</a>
                        </td> -->
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