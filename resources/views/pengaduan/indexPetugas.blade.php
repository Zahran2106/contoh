@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon blue mb-2">
                            <img src="{{ asset('assets/bootstrap-icons/arrow-clockwise.svg') }}" alt="">
                        </div>
                    </div>
                    <a href="/petugas/pengaduan">
                        <h6 class="text-muted font-semibold">Total Aduan</h6>
                        <h6 class="font-extrabold mb-0">{{ $totalAduan }}</h6>
                    </a>
                    <!-- <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Aduan Proses</h6>
                        <h6 class="font-extrabold mb-0">{{ $aduanProses }}</h6>
                    </div> -->
                </div>
            </div>
        </div>
</div>
        <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <img src="{{ asset('assets/bootstrap-icons/arrow-clockwise.svg') }}" alt="">
                                </div>
                            </div>
                            <a href="/petugas/pengaduan/proses">
                                <h6 class="text-muted font-semibold">Aduan Proses</h6>
                                <h6 class="font-extrabold mb-0">{{ $aduanProses }}</h6>
                            </a>
                            <!-- <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Aduan Proses</h6>
                                <h6 class="font-extrabold mb-0">{{ $aduanProses }}</h6>
                            </div> -->
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <img src="{{ asset('assets/bootstrap-icons/check-square.svg') }}" alt="">
                                </div>
                            </div>
                            <a href="/petugas/pengaduan/selesai">
                            <h6 class="text-muted font-semibold">Aduan Selesai</h6>
                                <h6 class="font-extrabold mb-0">{{ $aduanSelesai }}</h6>
                            </a>
                            <!-- <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Aduan Selesai</h6>
                                <h6 class="font-extrabold mb-0">{{ $aduanSelesai }}</h6>
                            </div> -->
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <img src="{{ asset('assets/bootstrap-icons/check-square.svg') }}" alt="">
                                </div>
                            </div>
                            <a href="/petugas/pengaduan/pending">
                                <h6 class="text-muted font-semibold">Aduan Pending</h6>
                                <h6 class="font-extrabold mb-0">{{ $aduanPending }}</h6>
                            </a>
                            <!-- <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Aduan Pending</h6>
                                <h6 class="font-extrabold mb-0">{{ $aduanPending }}</h6>
                            </div> -->
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="card">
        <div class="d-flex card-header">
            <h4 class="card-title">Data Pengaduan</h4>
            <a href="/cetak/{{ $cetak }}" class="btn btn-primary ms-auto">
                <img src="{{ asset('assets/bootstrap-icons/printer.svg') }}" width="20px" alt="">
                Generate Laporan
            </a>    
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session ('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session ('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table table-bordered table-dark mb-2 text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="width: 200px">Tanggal</th>
                            <th>Nama</th>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduans as $pengaduan)
                            <tr>
                                <td>{{ $pengaduans->firstItem() + $loop->index }}</td>
                                <td>
                                    <p class="m-0">Pengaduan : {{ $pengaduan->tgl_pengaduan }}</p>
                                    <p class="m-0">Proses : {{ $pengaduan->getDataTanggapan != null ? $pengaduan->getDataTanggapan->tgl_tanggapan : '-' }}</p>
                                    <p class="m-0">Selesai : {{ $pengaduan->status == 'Selesai' ? $pengaduan->tgl_selesai : '-' }}</p>
                                </td>
                                <td>{{ $pengaduan->getDataMasyarakat->nama }}</td>
                                <td>{{ $pengaduan->isi_laporan }}</td>
                                <td>
                                    @if ($pengaduan->foto != "-")
                                        <img src="{{ asset($pengaduan->foto) }}" alt="foto aduan" width="100px">
                                    @else
                                        {{ $pengaduan->foto }}
                                    @endif
                                </td>
                                <td>
                                    {!! 
                                        $pengaduan->status == "0" ? '<span class="badge text-bg-secondary">Pending</span>' :    
                                        ($pengaduan->status == "Proses" ? '<span class="badge text-bg-warning">Proses</span>' : '<span class="badge text-bg-success">Selesai</span>')
                                    !!}
                                </td>
                                <td>
                                    <a class="text-decoration-none" href="/petugas/tanggapan/create/{{ $pengaduan->id }}">
                                        <button type="button" class="btn btn-warning btn-sm">
                                            <img src="{{ asset('assets/bootstrap-icons/pencil-square.svg') }}" width="20px" alt="">
                                        </button>
                                    </a>
                                    <a class="text-decoration-none" href="/petugas/pengaduan/delete/{{ $pengaduan->id }}" onclick="return confirm('Are you sure to delete?')">
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <img src="{{ asset('assets/bootstrap-icons/trash.svg') }}" width="20px" alt="">
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pengaduans->links() }}
            </div>
        </div>
    </div>
@endsection