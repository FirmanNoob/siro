@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title text-dark col-sm-6 text-left">{{ $data->nama_Pelatihan}}</h5>
                                <a href="#" class="col-sm-4"> </a>
                                <a href="{{ route('pelatihan') }}" class="col-sm-6 btn rounded-pill btn-outline-primary text-primary ml-auto small-btn" style="width: auto; height: 40px; mix-blend-mode:hard-light;"><i class='bx bx-left-arrow-alt'></i> Kembali</a>
                            </div>

                            <div class="row mt-4">
                                <div class="card-title col-sm-3 text-left text-primary"><i class='bx bx-calendar-event' style='color:#2500ff'></i> {{$data->tanggal_awal->format('l, d-M-Y')}}</div>
                                <div class="col-sm-3 text-center text-primary"><i class='bx bxs-time-five' style='color:#2500ff'></i> {{$data->waktu_mulai}} - {{ $data->waktu_berakhir }}</div>
                                <div class="col-sm-3 text-end text-primary"><i class='bx bxs-location-plus' style='color:#2500ff'></i> {{$data->lokasi}}</div>
                            </div>
                            <p class="mb-4">
                                {{ $data->deskripsi }}
                            </p>
                            <button onclick="showPeserta()" type="button" class="btn rounded-pill btn-outline-primary text-primary" id="pesertaBtn"><i class='bx bxs-user' style='color:#2500ff'></i> Peserta</button>
                            <button onclick="showPembatalanPelatihan()" type="button" class="btn rounded-pill btn-outline-primary text-primary" id="pembatalanBtn"><i class='bx bxs-user' style='color:#2500ff'></i> Pembatalan Pelatihan</button>
                            <button onclick="showSesi()" type="button" class="btn rounded-pill btn-outline-primary text-primary" id="sesiBtn"><i class='bx bxs-user' style='color:#2500ff'></i> Sesi Pelatihan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Peserta -->
        <div id="pesertaContent" class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title text-dark col-sm-6 text-left">Peserta</h5>
                            </div>

                            <div class="table-responsive text-nowrap">
                                <table class="table card-table">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Sertifikat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach($pesertas as $peserta)
                                        <tr class="table-secondary">
                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> {{ $peserta->user->name }}</td>
                                            <td>{{ $peserta->user->email }}</td>
                                            <td>
                                                @if (!$peserta->is_approved)
                                                <form method="post" action="{{ route('approveAndGenerateCertificate', ['userId' => $peserta->user_id, 'trainingId' => $peserta->pelatihan_id]) }}">
                                                    @csrf
                                                    <button class="btn btn-primary" type="submit">Approve</button>
                                                </form>
                                                @endif
                                            </td>
                                            <td>Albert Cook</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pembatalan Peserta -->
        <div id="pembatalanPelatihanContent" class="col-lg-12 mb-4 order-0" style="display: none;">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title text-dark col-sm-6 text-left">Pembatalan Pelatihan</h5>
                            </div>

                            <div class="table-responsive text-nowrap">
                                <table class="table card-table">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Alasan</th>
                                            <th>Status</th>
                                            <th>Pembatalan Pelatihan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach($pesertas as $peserta)
                                        <tr class="table-secondary">
                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> {{ $peserta->user->name }}</td>
                                            <td>{{ $peserta->alasanPembatalan }}</td>
                                            <td><span class="badge rounded-pill bg-primary">{{ $peserta->status }}</span></td>
                                            <td>
                                                <form action="{{ route('approve-cancellation', $peserta->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Setujui Pembatalan</button>
                                                </form>
                                            </td>
                                            <td>Albert Cook</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sesi Pelatihan -->
        <div id="sesiContent" class="col-lg-12 mb-4 order-0" style="display: none;">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title text-dark col-sm-6 text-left">Sesi Pelatihan</h5>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('viewTambahSesi', $data->id) }}" class="btn btn-primary">Sesi</a>
                                </div>
                            </div>

                            <div class="table-responsive text-nowrap">
                                <table class="table card-table">
                                    <thead>
                                        <tr>
                                            <th>Nama Sesi</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach($sesiPelatihans as $sesi)
                                        <tr class="table-secondary">
                                            <td>{{ $sesi->namasesi }}</td>
                                            <td>{{ $sesi->tanggal->format('l, d-M-Y') }}</td>
                                            <td>{{ $sesi->waktuMulai }}
                                            </td>
                                            <td>Albert Cook</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    function showPembatalanPelatihan() {
        // Sembunyikan konten Peserta
        document.getElementById("pesertaContent").style.display = "none";
        document.getElementById("sesiContent").style.display = "none";

        // Tampilkan konten Pembatalan Pelatihan
        document.getElementById("pembatalanPelatihanContent").style.display = "block";

        // Atur kelas "active" pada tombol Pembatalan Pelatihan
        document.getElementById("pembatalanBtn").classList.add("active");
        // Hapus kelas "active" pada tombol Peserta
        document.getElementById("pesertaBtn").classList.remove("active");
        document.getElementById("sesiBtn").classList.remove("active");
    }

    function showPeserta() {
        // Sembunyikan konten Peserta
        document.getElementById("pembatalanPelatihanContent").style.display = "none";
        document.getElementById("sesiContent").style.display = "none";

        // Tampilkan konten Pembatalan Pelatihan
        document.getElementById("pesertaContent").style.display = "block";

        // Atur kelas "active" pada tombol Peserta
        document.getElementById("pesertaBtn").classList.add("active");
        // Hapus kelas "active" pada tombol Pembatalan Pelatihan
        document.getElementById("pembatalanBtn").classList.remove("active");
        document.getElementById("sesiBtn").classList.remove("active");
    }

    function showSesi() {
        // Sembunyikan konten Peserta
        document.getElementById("pembatalanPelatihanContent").style.display = "none";
        document.getElementById("pesertaContent").style.display = "none";

        // Tampilkan konten Pembatalan Pelatihan
        document.getElementById("sesiContent").style.display = "block";

        // Atur kelas "active" pada tombol Peserta
        document.getElementById("sesiBtn").classList.add("active");
        // Hapus kelas "active" pada tombol Pembatalan Pelatihan
        document.getElementById("pembatalanBtn").classList.remove("active");
        document.getElementById("pesertaBtn").classList.remove("active");
    }
</script> -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Hide all content initially
        document.getElementById("pesertaContent").style.display = "none";
        document.getElementById("pembatalanPelatihanContent").style.display = "none";
        document.getElementById("sesiContent").style.display = "none";
    });

    function showPembatalanPelatihan() {
        // Sembunyikan semua konten
        hideAllContent();

        // Tampilkan konten Pembatalan Pelatihan
        document.getElementById("pembatalanPelatihanContent").style.display = "block";

        // Atur kelas "active" pada tombol Pembatalan Pelatihan
        document.getElementById("pembatalanBtn").classList.add("active");
    }

    function showPeserta() {
        // Sembunyikan semua konten
        hideAllContent();

        // Tampilkan konten Peserta
        document.getElementById("pesertaContent").style.display = "block";

        // Atur kelas "active" pada tombol Peserta
        document.getElementById("pesertaBtn").classList.add("active");
    }

    function showSesi() {
        // Sembunyikan semua konten
        hideAllContent();

        // Tampilkan konten Sesi
        document.getElementById("sesiContent").style.display = "block";

        // Atur kelas "active" pada tombol Sesi
        document.getElementById("sesiBtn").classList.add("active");
    }

    function hideAllContent() {
        // Sembunyikan semua konten
        document.getElementById("pesertaContent").style.display = "none";
        document.getElementById("pembatalanPelatihanContent").style.display = "none";
        document.getElementById("sesiContent").style.display = "none";

        // Hapus kelas "active" dari semua tombol
        document.getElementById("pembatalanBtn").classList.remove("active");
        document.getElementById("pesertaBtn").classList.remove("active");
        document.getElementById("sesiBtn").classList.remove("active");
    }
</script>
@endsection