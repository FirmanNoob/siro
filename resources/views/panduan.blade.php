@extends('layoutsF.master')

@section('content')
<!-- <header class="site-header section-padding d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">

            <div class="col-lg-10 col-12">
                <h1>
                    <span class="d-block text-primary">Your favorite questions</span>
                    <span class="d-block text-dark">and our answers to them</span>
                </h1>
            </div>
        </div>
    </div>
</header> -->

<section class="faq section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <h2>Pertanyaan yang sering diajukan !!!</h2>

                <div class="accordion" id="accordionGeneral">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionGeneralOne" aria-expanded="true" aria-controls="accordionGeneralOne">
                                Bagaimana cara membuat akun pada website pelatihan departemen bangdiklat RSAL dr.Mintohardjo
                            </button>
                        </h2>

                        <div id="accordionGeneralOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionGeneral">

                            <div class="accordion-body">
                                <p class="large-paragraph">Buka Website Pelatihan Departemen Bangdiklat RSAL dr.Mintohardjo</p>
                                <p class="large-paragraph">Masuk ke menu login, klik tombol buat akun terlebih dahulu atau klik disini</p>
                                <p class="large-paragraph">Pada halaman register terdapat form pendaftaran, isi lengkap form tersebut sesuai keterangan yang tersedia</p>
                                <p class="large-paragraph">Check kembali data yang sudah di inputkan</p>
                                <p class="large-paragraph">Bila semua data sudah benar, klik tombol register</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionGeneralTwo" aria-expanded="false" aria-controls="accordionGeneralTwo">
                                Bagaimana tata cara melakukan pendaftaran pelatihan pada website departemen bangdiklat RSAL dr.Mintohardjo
                            </button>
                        </h2>

                        <div id="accordionGeneralTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionGeneral">

                            <div class="accordion-body">
                                <p class="large-paragraph">Buka Website Pelatihan Departemen Bangdiklat RSPAL dr. Ramelan</p>
                                <p class="large-paragraph">Bila belum punya akun daftar terlebih dahulu disini</p>
                                <p class="large-paragraph">Pada menu pelatihan pilih pelatihan yang di inginkan</p>
                                <p class="large-paragraph">Perlu diingat, pilih status pelatihan yang dibuka saja</p>
                                <p class="large-paragraph">Klik tombol detail pelatihan, harap baca keterangan pelatihan dengan saksama</p>
                                <p class="large-paragraph">Setelah itu klik tombol register</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionGeneralThree" aria-expanded="false" aria-controls="accordionGeneralThree">
                                Bagaimana cara pembayaran pelatihan di website pelatihan Departemen Bangdiklat RSAL dr.Mintohardjo
                            </button>
                        </h2>

                        <div id="accordionGeneralThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionGeneral">

                            <div class="accordion-body">
                                <p class="large-paragraph">Setelah peserta registrasi pada pelatihan yang diinginkan maka peserta akan melakukan pembayaran</p>
                                <p class="large-paragraph">Peserta melakukan pembayaran sesuai detail intruksi yang tersedia</p>
                                <p class="large-paragraph">Setelah peserta melakukan pembayaran, maka peserta akan melakukan verifikasi pembayaran ke contact person yang ada di informasi pelatihan</p>
                                <p class="large-paragraph">Petugas akan memverifikasi pembayaran</p>
                                <p class="large-paragraph">Setelah pembayaran terverifikasi peserta dapat mendownload tiket pelatihan pada halaman dashboard
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- <h2 class="mt-5">About <span>our products</span></h2> -->

                <div class="accordion" id="accordionProduct">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionProductOne" aria-expanded="true" aria-controls="accordionProductOne">
                                Bagaimana cara memperoleh sertifikat pelatihan ?
                            </button>
                        </h2>

                        <div id="accordionProductOne" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionProduct">

                            <div class="accordion-body">
                                <p class="large-paragraph">Untuk Sertitikat dapat di download di halaman dashboard</p>
                                <p class="large-paragraph">Peserta yang dapat mendownload sertifikat hanya peserta yang telah mengikuti pelatihan</p>
                                <p class="large-paragraph">Peserta yang mendaftar pelatihan tapi tidak mengikuti pelatihan sampai selesai tidak akan mendapatkan sertifikat</p>
                                <p class="large-paragraph">Perlu di ingat setiap mengikuti pelatihan harap mengisi absensi untuk mempermudah proses mendapatkan sertifikat
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionProductTwo" aria-expanded="false" aria-controls="accordionProductTwo">
                                Bagaimana cara check keaslian sertifikat yang saya miliki ?
                            </button>
                        </h2>

                        <div id="accordionProductTwo" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionProduct">

                            <div class="accordion-body">
                                <p class="large-paragraph">Buka Website Pelatihan Departemen Bangdiklat RSPAL dr. Ramelan</p>
                                <p class="large-paragraph">Masuk ke menu Cek Sertifikat</p>
                                <p class="large-paragraph">Ketikan nomor seri sertifikat pada inputan yang tersedia</p>
                                <p class="large-paragraph">Check kembali data yang sudah di inputkan</p>
                                <p class="large-paragraph">Bila data sudah benar, klik tombol Cek Sertifikat</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
@endsection