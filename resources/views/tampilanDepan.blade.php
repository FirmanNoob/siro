@extends('layoutsF.master')

@section('content')
<section class="slick-slideshow">
    <!-- <div class="slick-custom">
        <img src="https://diklat.rspaldrramelan.com/assets/gambar/user/banner.svg" class="img-fluid" alt="">

        <div class="slick-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-10">
                        <h3 class="slick-title">Struktur Organisasi Komkordik</h3>

                        <p class="lead text-white mt-lg-3 mb-lg-5">Komite Koordinasi Pendidikan (KOMKORDIK) merupakan satuan organisasi fungsional yang berkedudukan di Rumkital dr. Mintohardjo sebagai Rumah Sakit Pendidikan dan dibentuk berdasarkan :</p>

                        <a href="{{route('about')}}" class="btn custom-btn">Tentang Kami</a>

                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="slick-custom">
        <img src="{{ asset('depan/images/PANORAMA GEDUNG MTH.jpg') }}" class="img-fluid" alt="">

        <div class="slick-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-10">
                        <h3 class="slick-title">Struktur Organisasi Komkordik</h3>

                        <p class="lead text-white mt-lg-3 mb-lg-5">Komite Koordinasi Pendidikan (KOMKORDIK) merupakan satuan organisasi fungsional yang berkedudukan di Rumkital dr. Mintohardjo sebagai Rumah Sakit Pendidikan dan dibentuk berdasarkan :</p>

                        <a href="product.html" class="btn custom-btn">Explore products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slick-custom">
        <img src="{{ asset('depan/images/PANORAMA GEDUNG MTH.jpg') }}" class="img-fluid" alt="">

        <div class="slick-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-10">
                        <h3 class="slick-title">Struktur Organisasi Komkordik</h3>

                        <p class="lead text-white mt-lg-3 mb-lg-5">Komite Koordinasi Pendidikan (KOMKORDIK) merupakan satuan organisasi fungsional yang berkedudukan di Rumkital dr. Mintohardjo sebagai Rumah Sakit Pendidikan dan dibentuk berdasarkan :</p>

                        <a href="contact.html" class="btn custom-btn">Work with us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="about section-padding">
    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <h2>HALO SELAMAT DATANG DI</h2>
                <P>Pelatihan Diklat RSAL dr. Mintohardjo</P>
            </div>

            <div class="col-lg-2 col-12 mt-auto mb-auto">
                <ul class="nav nav-pills mb-5 mx-auto justify-content-center align-items-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Tentang Kami</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-youtube-tab" data-bs-toggle="pill" data-bs-target="#pills-youtube" type="button" role="tab" aria-controls="pills-youtube" aria-selected="true">Profil</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-skill-tab" data-bs-toggle="pill" data-bs-target="#pills-skill" type="button" role="tab" aria-controls="pills-skill" aria-selected="false">Capabilites</button>
                    </li>
                </ul>
            </div>

            <div class="col-lg-10 col-12">
                <div class="tab-content mt-2" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                        <div class="row">
                            <div class="col-lg-7 col-12">
                                <img src="{{ asset('depan/images/pim-chu-z6NZ76_UTDI-unsplash.jpeg') }}" class="img-fluid" alt="">
                            </div>

                            <div class="col-lg-5 col-12">
                                <div class="d-flex flex-column h-100 ms-lg-4 mt-lg-0 mt-5">
                                    <h4>Tentang Kami</h4>
                                    <small class="mb-3">Unit Pendidikan dan Pelatihan</small>

                                    <p>Tim Kerja Pendidikan dan Pelatihan adalah salah satu unit Kerja di RSAL dr. Mintohardjo
                                        yang memiliki fungsi menyelenggarakan kegiatan-kegiatan pendidikan dan pelatihan untuk pegawai internal maupun ekternal rumah sakit.</p>

                                    <!-- <p>Adapun Unit Diklat memiliki tugas sebagai berikut : <br>
                                        - Memberikan dukungan administrasi proses pembelajaran klinik di Rumah Sakit Pendidikan. <br>
                                        - Menyusun perencanaan kegiatan dan anggaran belanja tahunan pembelajaran klinik sesuai kebutuhan. <br>
                                        = Menyusun perencanaan kebutuhan sarana dan prasarana yang diperlukan Mahasiswa. <br>
                                        - Membentuk sistem informasi terpadu untuk menunjang penyelenggaraan fungsi pelayanan, pendidikan dan penelitian bidang kedokteran, kedokteran gigi dan kesehatan lain.
                                    </p> -->

                                    <div class="mt-2 mt-lg-auto">
                                        <a href="{{ route('about') }}" class="custom-link mb-2">
                                            Learn more about us
                                            <i class="bi-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-youtube" role="tabpanel" aria-labelledby="pills-youtube-tab">

                        <div class="row">
                            <div class="col-lg-7 col-12">
                                <div class="ratio ratio-16x9">
                                    <iframe src="https://www.youtube.com/embed/8u7My0EF3is?si=QaT-3C0DMw1FuNiy" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>

                            <div class="col-lg-5 col-12">
                                <div class="d-flex flex-column h-100 ms-lg-4 mt-lg-0 mt-5">
                                    <h4 class="mb-3">Sambutan Karumkital dr. Mintohardjo</h4>

                                    <p>Memberikan pelayanan yang prima dan menentramkan bagi pasien dan keluarga pasien merupakan tekad dan komitmen seluruh jajaran Rumkital dr.Mintohardjo. Oleh karena itu berbagai usaha yang terpadu untuk pelayanan yang berorientasi pada perwujudan komitmen terus diupayakan secara berkesinambungan.</p>

                                    <!-- <p>Custom work is branding, web design, UI/UX design</p> -->

                                    <div class="mt-2 mt-lg-auto">
                                        <a href="contact.html" class="custom-link mb-2">
                                            Work with us
                                            <i class="bi-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-skill" role="tabpanel" aria-labelledby="pills-skill-tab">
                        <div class="row">
                            <div class="col-lg-7 col-12">
                                <img src="{{ asset('depan/images/cody-lannom-G95AReIh_Ko-unsplash.jpeg') }}" class="img-fluid" alt="">
                            </div>

                            <div class="col-lg-5 col-12">
                                <div class="d-flex flex-column h-100 ms-lg-4 mt-lg-0 mt-5">
                                    <h4 class="mb-3">What can help you?</h4>

                                    <p>Over three years in business, We’ve had the chance on projects</p>

                                    <div class="skill-thumb mt-3">

                                        <strong>Branding</strong>
                                        <span class="float-end">90%</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                        </div>

                                        <strong>Design & Stragety</strong>
                                        <span class="float-end">70%</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                        </div>

                                        <strong>Online Platform</strong>
                                        <span class="float-end">80%</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                        </div>

                                    </div>

                                    <div class="mt-2 mt-lg-auto">
                                        <a href="products.html" class="custom-link mb-2">
                                            Explore products
                                            <i class="bi-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<section class="featured-product section-padding">
    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <h2 class="mb-5">Pelatihan Bangdiklat</h2>
            </div>
            @foreach($pelatihan as $p)
            <div class="col-lg-4 col-12 mb-3">
                <div class="product-thumb">
                    <a href="/pelatihan/{{$p->id}}/detail">
                        <img src="{{ asset('gambar-pelatihan/'.$p->gambar) }}" class="img-fluid product-image" alt="">
                    </a>

                    <div class="product-top d-flex">
                        <span class="product-alert me-auto">New Arrival</span>

                        <a href="#" class="bi-heart-fill product-icon"></a>
                    </div>

                    <div class="product-info d-flex">
                        <div>
                            <h5 class="product-title mb-0">
                                <a href="/pelatihan/{{$p->id}}/detail" class="product-title-link">{{ $p->nama_Pelatihan }}</a>
                            </h5>
                            <p class="product-p">Dibuka</p>
                            <p class="product-p">Lokasi : {{ $p->lokasi }}</p>
                            <p class="product-p">Registrasi : {{ $p->tanggal_awal->format('l, d-M-Y') }} - {{ $p->tanggal_berakhir->format('l, d-M-Y') }}</p>
                            <p class="product-p">Kouta In : {{ $p->kouta }}</p>
                            <p class="product-p">Kouta Ex : 50</p>
                        </div>

                        <small class="product-price text-muted ms-auto mt-auto mb-5">$25</small>
                    </div>
                </div>
            </div>
            @endforeach


            <div class="col-12 text-center">
                <a href="products.html" class="view-all">View All Products</a>
            </div>

        </div>
    </div>
</section>
@endsection