@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Masyarakat</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-dark mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Username</th>
                            <th>No. Telepon</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($masyarakats as $masyarakat)
                            <tr>
                                <td>{{ $masyarakats->firstItem() + $loop->index }}</td>
                                <td class="text-bold-500">{{ $masyarakat->nama }}</td>
                                <td>{{ $masyarakat->nik }}</td>
                                <td>{{ $masyarakat->username }}</td>
                                <td>{{ $masyarakat->telp }}</td>
                                <td>
                                    <a class="text-decoration-none" href="/petugas/masyarakat/delete/{{ $masyarakat->id }}" onclick="return confirm('Are you sure to delete?')">
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <img src="{{ asset('assets/bootstrap-icons/trash.svg') }}" width="20px" alt="">
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection