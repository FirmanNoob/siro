@extends('layoutsF.master')

@section('content')
<section class="sign-in-form section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 mx-auto col-12">

                <h3 class="hero-title text-center mb-5">Login</h3>
                <div class="row">
                    <div class="col-lg-8 col-11 mx-auto">
                        <form action="{{ route('login-proses') }}" method="post">
                            @csrf
                            <div class="form-floating mb-4 p-0">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email address" value="{{ old('email') }}">

                                <label for="email">Email</label>
                                @error('email')
                                <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-floating p-0">
                                <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}" placeholder="Password">

                                <label for="password">Password</label>
                                @error('password')
                                <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                Login
                            </button>

                            <p class="text-center">Belum Punya Akun? <a href="{{route('register')}}">Buat Akun</a></p>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection