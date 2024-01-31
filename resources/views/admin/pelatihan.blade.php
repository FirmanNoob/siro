@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Table Pelatihan Peserta</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <!-- <h5 class="card-header">Table Basic</h5> -->
        <!-- <button type="button" class="btn btn-primary">Primary</button> --><!-- Button trigger modal -->
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-header">Table Basic</h5>
            </div>
            <div class="col-md-6 mt-4 text-end">
                <button type="button" class="btn btn-primary">Primary</button>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>Nama Pelatihan</th>
                        <th>Peserta</th>
                        <th>Tanggal Awal</th>
                        <th>Lokasi</th>
                        <!-- <th>Waktu Mulai</th> -->
                        <!-- <th>Waktu Berakhir</th> -->
                        <!-- <th>Kouta</th> -->
                        <th>Gambar</th>
                        <!-- <th>Deskripsi</th> -->
                        <!-- <th>Link</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($data_pelatihan as $pelatihan)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><a href="pelatihan/{{$pelatihan->id}}/dashboard">{{ $pelatihan->nama_Pelatihan }}</a> </td>
                        <td>{{ $pelatihan->jumlahPeserta() }}</td>
                        <td>{{ $pelatihan->tanggal_awal->format('l, d-M-Y') }}</td>
                        <td>{{ $pelatihan->lokasi }}</td>
                        <!-- <td>{{ $pelatihan->tanggal_berakhir->format('l, d-M-Y') }}</td> -->
                        <!-- <td>{{ $pelatihan->waktu_mulai }}</td> -->
                        <!-- <td>{{ $pelatihan->waktu_berakhir }}</td> -->
                        <!-- <td>{{ $pelatihan->kouta }}</td> -->
                        <!-- <td>{{ asset('/storage/gambar-pelatihan/'. $pelatihan->gambar) }}</td> -->
                        <td><img src="{{ asset('gambar-pelatihan/'.$pelatihan->gambar) }}" alt="" width="100"></td>
                        <!-- <td>{{ $pelatihan->deskripsi }}</td> -->
                        <!-- <td><a href="{{ $pelatihan->link }}">Test</a></td> -->
                        <td>
                            <a href="pelatihan/{{$pelatihan->id}}/update" class="btn rounded-pill btn-primary">Update</a>
                            <a href="/pelatihan/{{$pelatihan->id}}/delete" class="btn rounded-pill btn-danger">delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    @endsection