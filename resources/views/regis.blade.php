@extends('layoutsF.master')

@section('content')
<section class="sign-in-form section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 mx-auto col-12">

                <h3 class="hero-title text-center mb-5">Daftar Akun</h3>

                <!-- <div class="social-login d-flex flex-column w-50 m-auto">

                    <a href="#" class="btn custom-btn social-btn mb-4">
                        <i class="bi bi-google me-3"></i>

                        Continue with Google
                    </a>

                    <a href="#" class="btn custom-btn social-btn">
                        <i class="bi bi-facebook me-3"></i>

                        Continue with Facebook
                    </a>
                </div> -->

                <!-- <div class="div-separator w-50 m-auto my-5"><span>or</span></div> -->

                <div class="row">
                    <div class="col-lg-8 col-11 mx-auto">
                        <form role="form" action="{{route('register-proses')}}" method="post">
                            @csrf
                            <div class="form-floating mb-4 p-0">
                                <input type="text" name="name" id="name" class="form-control" placeholder="name address">

                                <label for="name">Nama Lengkap</label>
                                @error('name')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email address">

                                <label for="email">Email</label>
                                @error('email')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating my-4">
                                <input type="text" name="nik" id="nik" class="form-control" placeholder="nik address">

                                <label for="nik">NIK</label>
                                @error('nik')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating my-4">
                                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="jabatan address">

                                <label for="jabatan">Jabatan/Bagian</label>
                                @error('jabatan')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating my-4">
                                <input type="text" name="nip" id="nip" class="form-control" placeholder="nip address">

                                <label for="nip">NIP/NRP</label>
                                @error('nip')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating my-4">
                                <input type="text" name="str" id="str" class="form-control" placeholder="str address">

                                <label for="str">Nomor STR</label>
                                @error('str')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating my-4">
                                <!-- <input type="text" name="jkelamin" id="jkelamin" class="form-control" placeholder="jkelamin address" required> -->
                                <select name="jkelamin" id="jkelamin" class="form-control">
                                    <option value="lakiLaki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                                <label for="jkelamin">Jenis Kelamin</label>
                                @error('jkelamin')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating my-4">
                                <input type="date" name="tlahir" id="tlahir" class="form-control" placeholder="tlahir address">

                                <label for="tlahir">Tanggal Lahir</label>
                                @error('tlahir')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating my-4">
                                <!-- <input type="text" name="agama" id="agama" class="form-control" placeholder="agama address" required> -->
                                <select name="agama" id="agama" class="form-control">
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="protestan">Protestan</option>
                                    <option value="kristenkatolik">Kristen Katolik</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="buddha">Buddha</option>
                                    <option value="konghucu">Konghucu</option>
                                </select>
                                <label for="agama">agama</label>
                                @error('agama')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating my-4">
                                <!-- <input type="text" name="pterakhir" id="pterakhir" class="form-control" placeholder="pterakhir address" required> -->
                                <select name="pterakhir" id="pterakhir" class="form-control">
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="SMK">SMK</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                                <label for="pterakhir">Pendidikan Terakhir</label>
                                @error('pterakhir')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating my-4">
                                <input type="text" name="pangkat" id="pangkat" class="form-control" placeholder="pangkat address">

                                <label for="pangkat">Pangkat</label>
                                @error('pangkat')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating my-4">
                                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="alamat address">

                                <label for="alamat">Alamat</label>
                                @error('alamat')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating my-4">
                                <input type="text" name="nohp" id="nohp" class="form-control" placeholder="nohp address">

                                <label for="nohp">Nomor Telepon</label>
                                @error('nohp')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating my-4">
                                <input type="password" name="password" id="password" pattern="[0-9a-zA-Z]{4,10}" class="form-control" placeholder="Password">

                                <label for="password">Password</label>
                                @error('password')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                                <!-- <p class="text-center">* shall include 0-9 a-z A-Z in 4 to 10 characters</p> -->
                            </div>

                            <!-- <div class="form-floating">
                                <input type="password" name="confirm_password" id="confirm_password" pattern="[0-9a-zA-Z]{4,10}" class="form-control" placeholder="Password" required>

                                <label for="confirm_password">Password Confirmation</label>
                            </div> -->

                            <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                Daftar Akun
                            </button>

                            <p class="text-center">Sudah Memiliki Akun? Silahkan <a href="{{route('login')}}">Masuk</a></p>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection