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
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="pelatihanUserSesi/{{$data->pelatihan->id}}" class="btn rounded-pill btn-primary">Detail</a>
                                </div>
                                <!-- Button pembatalan -->
                                <div class="col-md-6">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn rounded-pill btn-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">
                                        Batalkan
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                                        <div class="modal-dialog">
                                            <form class="modal-content" action="{{ route('cancel-training', $data->pelatihan->id) }}" method="post">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="backDropModalTitle">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="alasanPembatalan" class="form-label">Alasan Pembatalan</label>
                                                            <textarea name="alasanPembatalan" class="form-control" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- @if ($data->is_approved)
                            <a href="{{ route('downloadCertificate', ['userId' => $data->user_id, 'trainingId' => $data->pelatihan_id]) }}" class="btn btn-success">Download Sertifikat</a>
                            @endif -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection