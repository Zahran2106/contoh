@extends('layouts.master')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('petugas.landing') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('petugas.index') }}">Petugas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Petugas</li>
    </ol>
</nav>
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Petugas</h4>
        </div>
    
        <div class="card-body">
            <div class="row">
                <form action="{{ route('petugas.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="basicInput">Nama</label>
                        <input name="nama" type="text" class="form-control" id="basicInput" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Username</label>
                        <input name="username" type="text" class="form-control" id="basicInput" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Password</label>
                        <input name="password" type="password" class="form-control" id="basicInput" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Telp</label>
                        <input name="telp" type="number" class="form-control" id="basicInput" placeholder="No. Telepon">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Level</label>
                        <select name="level" name="level" class="form-control" id="basicInput">
                            <option value="" selected disabled>- Pilih Level -</option>
                            <option value="Petugas">Petugas</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                        <a href="{{ route('petugas.index') }}" class="btn btn-outline-primary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection