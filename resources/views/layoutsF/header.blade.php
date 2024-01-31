<nav class="navbar navbar-expand-lg">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="index.html">
            <!-- <strong><span>Little</span> Fashion</strong> -->
            <img src="{{ asset('depan/images/LOGO KANZA B.png') }}" alt="" width="35px">
        </a>

        <div class="d-lg-none">
            <a href="login" class="bi-person custom-icon me-3"></a>

            <!-- <a href="product-detail.html" class="bi-bag custom-icon"></a> -->
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="about">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="pelatihan">Pelatihan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="products.html">Cek Sertifikat</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('panduan') ? 'active' : '' }}" href="panduan">Panduan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="contact">Contact</a>
                </li>
            </ul>

            <div class="d-none d-lg-block">
                <a href="login" class="bi-person custom-icon me-3"></a>
            </div>
        </div>
    </div>
</nav>