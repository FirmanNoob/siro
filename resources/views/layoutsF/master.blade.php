<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIRO</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

    <link href="{{ asset('depan/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('depan/css/bootstrap-icons.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('depan/css/slick.css') }}" />

    <link href="{{ asset('depan/css/tooplate-little-fashion.css') }}" rel="stylesheet">
    <!--

Tooplate 2127 Little Fashion

https://www.tooplate.com/view/2127-little-fashion

-->
</head>

<body>

    <section class="preloader">
        <div class="spinner">
            <span class="sk-inner-circle"></span>
        </div>
    </section>

    <main>

        @includeIf('layoutsF.header')

        @yield('content')

        <!-- <section class="front-product">
            <div class="container-fluid p-0">
                <div class="row align-items-center">

                    <div class="col-lg-6 col-12">
                        <img src="{{ asset('depan/images/retail-shop-owner-mask-social-distancing-shopping.jpg') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="px-5 py-5 py-lg-0">

                            <h2 class="mb-4"><span>Retail</span> shop owners</h2>

                            <p class="lead mb-4">Credits go to Unsplash and FreePik websites for images used in this Little Fashion by Tooplate.</p>

                            <a href="products.html" class="custom-link">
                                Explore Products
                                <i class="bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section> -->



    </main>
    <!-- Footer -->
    @includeIf('layoutsF.footer')

    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('depan/js/jquery.min.js') }}"></script>
    <script src="{{ asset('depan/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('depan/js/Headroom.js') }}"></script>
    <script src="{{ asset('depan/js/jQuery.headroom.js') }}"></script>
    <script src="{{ asset('depan/js/slick.min.js') }}"></script>
    <script src="{{ asset('depan/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if($message = Session::get('failed'))
    <script>
        Swal.fire('{{ $message }}');
    </script>
    @endif
    @if($message = Session::get('success'))
    <script>
        Swal.fire('{{ $message }}');
    </script>
    @endif
</body>

</html>