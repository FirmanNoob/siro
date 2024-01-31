@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Pelatihan User Detail</h4>
    <div class="row mb-5">
        @foreach(auth()->user()->trainings as $data)
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card h-100">
                <img class="card-img-top" src="{{ asset('gambar-pelatihan/'.$data->pelatihan->gambar) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $data->pelatihan->nama_Pelatihan }}</h5>
                    <p class="card-text">
                        {{ $data->pelatihan->deskripsi }}
                    </p>
                    <button type="submit" class="btn btn-outline-primary">Go somewhere</button>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection