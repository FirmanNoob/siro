@extends('layouts.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Pengaturan Account</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Profile Detail</h5>
                <!-- Account -->
                <form id="formAccountSettings" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">

                            <img src="{{ auth()->user()->avatar }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" name="avatar" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                </label>

                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>
                                @error('avatar')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 2048K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Nama</label>
                                <input class="form-control" type="text" id="firstName" name="name" value="{{ old('name', $user->name) }}" autofocus />
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" type="text" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="john.doe@example.com" />
                                @error('email')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">NIK</label>
                                <input class="form-control" type="text" id="nik" name="nik" value="{{ old('nik', $user->nik) }}" placeholder="john.doe@example.com" />
                                @error('nik')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input class="form-control" type="text" id="jabatan" name="jabatan" value="{{ old('jabatan', $user->jabatan) }}" placeholder="john.doe@example.com" />
                                @error('jabatan')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nip" class="form-label">NIP/STR</label>
                                <input class="form-control" type="text" id="nip" name="nip" value="{{ old('nip', $user->nip) }}" placeholder="john.doe@example.com" />
                                @error('nip')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="str" class="form-label">Nomor STR</label>
                                <input class="form-control" type="text" id="str" name="str" value="{{ old('str', $user->str) }}" placeholder="john.doe@example.com" />
                                @error('str')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="jkelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jkelamin" id="jkelamin" class="form-control">
                                    <option value="lakiLaki" {{ old('jkelamin', $user->jkelamin) === 'lakiLaki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="perempuan" {{ old('jkelamin', $user->jkelamin) === 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jkelamin')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="tlahir" class="form-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" id="tlahir" name="tlahir" value="{{ old('tlahir', $user->tlahir) }}" placeholder="john.doe@example.com" />
                                @error('tlahir')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="agama" class="form-label">Agama</label>
                                <select name="agama" id="agama" class="form-control">
                                    <option value="islam" {{ old('agama', $user->agama) === 'islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="kristen" {{ old('agama', $user->agama) === 'kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="protestan" {{ old('agama', $user->agama) === 'protestan' ? 'selected' : '' }}>Protestan</option>
                                    <option value="kristenkatolik" {{ old('agama', $user->agama) === 'kristenkatolik' ? 'selected' : '' }}>Kristen Katolik</option>
                                    <option value="hindu" {{ old('agama', $user->agama) === 'hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="buddha" {{ old('agama', $user->agama) === 'buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="konghucu" {{ old('agama', $user->agama) === 'konghucu' ? 'selected' : '' }}>Konghucu</option>
                                </select>
                                @error('agama')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="pterakhir" class="form-label">Pendidikan Terakhir</label>
                                <!-- <input class="form-control" type="text" id="pterakhir" name="pterakhir" value="{{ old('pterakhir', $user->pterakhir) }}" placeholder="john.doe@example.com" /> -->
                                <select name="pterakhir" id="pterakhir" class="form-control">
                                    <option value="SD" {{ old('pterakhir', $user->pterakhir) === 'SD' ? 'selected' : '' }}>SD</option>
                                    <option value="SMP" {{ old('pterakhir', $user->pterakhir) === 'SMP' ? 'selected' : '' }}>SMP</option>
                                    <option value="SMA" {{ old('pterakhir', $user->pterakhir) === 'SMA' ? 'selected' : '' }}>SMA</option>
                                    <option value="SMK" {{ old('pterakhir', $user->pterakhir) === 'SMK' ? 'selected' : '' }}>SMK</option>
                                    <option value="D1" {{ old('pterakhir', $user->pterakhir) === 'D1' ? 'selected' : '' }}>D1</option>
                                    <option value="D2" {{ old('pterakhir', $user->pterakhir) === 'D2' ? 'selected' : '' }}>D2</option>
                                    <option value="D3" {{ old('pterakhir', $user->pterakhir) === 'D3' ? 'selected' : '' }}>D3</option>
                                    <option value="D4" {{ old('pterakhir', $user->pterakhir) === 'D4' ? 'selected' : '' }}>D4</option>
                                    <option value="S1" {{ old('pterakhir', $user->pterakhir) === 'S1' ? 'selected' : '' }}>S1</option>
                                    <option value="S2" {{ old('pterakhir', $user->pterakhir) === 'S2' ? 'selected' : '' }}>S2</option>
                                    <option value="S3" {{ old('pterakhir', $user->pterakhir) === 'S3' ? 'selected' : '' }}>S3</option>
                                </select>
                                @error('pterakhir')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="pangkat" class="form-label">Pangkat</label>
                                <input class="form-control" type="text" id="pangkat" name="pangkat" value="{{ old('pangkat', $user->pangkat) }}" placeholder="john.doe@example.com" />
                                @error('pangkat')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nohp" class="form-label">Nomor Telepon</label>
                                <input class="form-control" type="text" id="nohp" name="nohp" value="{{ old('nohp', $user->nohp) }}" placeholder="john.doe@example.com" />
                                @error('nohp')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <!-- <input class="form-control" type="text" id="alamat" name="alamat" value="{{ old('alamat', $user->alamat) }}" placeholder="john.doe@example.com" /> -->
                                <textarea id="basic-icon-default-message" name="alamat" class="form-control" placeholder="Alamat" aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2">{{ old('alamat', $user->alamat) }}</textarea>
                                @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>
</div>
@endsection