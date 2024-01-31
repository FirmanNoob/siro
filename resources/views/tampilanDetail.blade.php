@extends('layoutsF.master')

@section('content')

<header class="site-header section-padding d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-12">
                <h4>
                    <span class="d-block text-primary">{{$pelatihan->nama_Pelatihan}}</span>
                    <span class="d-block text-dark">Fashionable Stuffs</span>
                </h4>
            </div>
        </div>
    </div>
</header>

<section class="product-detail section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12">
                <div class="product-thumb">
                    <img src="{{ asset('storage/gambar-pelatihan/'.$pelatihan->gambar) }}" class="img-fluid product-image" alt="">
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <div class="product-info d-flex">
                    <div>
                        <h2 class="product-title mb-0">{{ $pelatihan->nama_Pelatihan }}</h2>

                        <p class="product-p">Lokasi : {{ $pelatihan->lokasi }}</p>
                        <p class="product-p">Jadwal : {{ $pelatihan->tanggal_awal->format('l, d-M-Y') }} - {{ $pelatihan->tanggal_berakhir->format('l, d-M-Y') }}</p>
                        <p class="product-p">Kouta : {{ $pelatihan->kouta }}</p>
                    </div>

                    <!-- <small class="product-price text-muted ms-auto mt-auto mb-5">$25</small> -->
                </div>

                <div class="product-description">

                    <strong class="d-block mt-4 mb-2">Description</strong>

                    <p class="lead mb-5">{{ $pelatihan->deskripsi }}</p>
                </div>

                <div class="product-cart-thumb row">

                    <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                        <button type="submit" class="btn custom-btn cart-btn" data-bs-toggle="modal" data-bs-target="#cart-modal">Add to Cart</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection