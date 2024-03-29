@extends('layouts.master')

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
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>Nama Pelatihan</th>
                        <th>Peserta</th>
                        <th>Tanggal Awal</th>
                        <th>Lokasi</th>
                        <th>Gambar</th>
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
                        <td><img src="{{ asset('gambar-pelatihan/'.$pelatihan->gambar) }}" alt="" width="100"></td>
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
</div>
@endsection