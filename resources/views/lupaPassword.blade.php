@extends('layoutsF.master')

@section('content')
<section class="sign-in-form section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 mx-auto col-12">

                <h3 class="hero-title text-center mb-5">Lupa Password?</h3>
                <div class="row">
                    <div class="col-lg-8 col-11 mx-auto">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session()->has('status'))
                        <div class="alert alert-success">
                            {{session()->get('status')}}
                        </div>
                        @endif
                        <form action="{{ route('lupaPasswordPost') }}" method="post">
                            @csrf
                            <p class="product-p">We will send a link to your email, use that link to reset password.</p>
                            <div class="form-floating mb-4 p-0">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                <label for="email">Email</label>
                            </div>

                            <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                Login
                            </button>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection