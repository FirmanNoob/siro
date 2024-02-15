@extends('layoutsF.master')

@section('content')
<section class="sign-in-form section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 mx-auto col-12">

                <h3 class="hero-title text-center mb-5">Lupa Password?</h3>
                <div class="row">
                    <div class="col-lg-8 col-11 mx-auto">
                        <form action="{{ route('resetPasswordPost') }}" method="post">
                            @csrf
                            <input type="text" name="token" hidden value="{{$token}}">
                            <div class="form-floating mb-4 p-0">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-4 p-0">
                                <input type="password" name="password" id="password" class="form-control" placeholder="password">
                                <label for="password">Enter new password</label>
                            </div>
                            <div class="form-floating mb-4 p-0">
                                <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="password">
                                <label for="password">Confirm Password</label>
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