@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">List Peserta</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Table Peserta</h5>
        <!-- <button type="button" class="btn btn-primary">Primary</button> --><!-- Button trigger modal -->
        <div class="table-responsive text-nowrap">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>Nama Peserta</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($data as $listUser)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $listUser->name }}</strong></td>
                        <td>{{ $listUser->email }}</td>
                        <td>{{ $listUser->role }}</td>
                        <td>
                            <a href="buat/{{$listUser->id}}" class="btn rounded-pill btn-danger">Generate</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    @endsection