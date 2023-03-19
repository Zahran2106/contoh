<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
        <img src="assets/icons/icon-kabupaten.png" alt="" width="100px">
		<h5>Layanan Pengaduan Masyarakat Desa Pandansari</h4>
        <p>Kp. Gadog, Kec. Ciawi,  Kab. Bogor</p>
	</center>
 
	<table class='table table-bordered text-center'>
		<thead>
			<tr class="table-primary">
				<th>No</th>
                <th>Tanggal Pengaduan</th>
                <th>NIK Pelapor</th>
                <th>Nama Pelapor</th>
                <th>Isi Aduan</th>
                <th>Status</th>
			</tr>
		</thead>
		<tbody>
      @php $i=1 @endphp
      @foreach ($tanggapans as $tanggapan)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $tanggapan->getDataPengaduan->tgl_pengaduan }}</td>
          <td>{{ $tanggapan->getDataPengaduan->nik }}</td>
          <td>{{ $tanggapan->getDataPengaduan->getDataMasyarakat->nama }}</td>
          <td>{{ $tanggapan->getDataPengaduan->isi_laporan }}</td>
          <td>{{ $tanggapan->getDataPengaduan->status}}</td>
        </tr>
      @endforeach
		</tbody>
	</table>
 
</body>
</html>



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Pelaporan Pengaduan Masyarakat</title>
</head>
<body>
    
    <span><strong>Nama Petugas : </strong> {{ Auth::guard('petugas')->user()->nama }}</span>
    <br>
    <span><strong>Tanggal : </strong> {{ now()->format('D, d M Y ') }}</span>
    <table border="1" cellpadding="2" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pengaduan</th>
                <th>NIK Pelapor</th>
                <th>Nama Pelapor</th>
                <th>Isi Aduan</th>
                <th>Isi Tanggapan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tanggapans as $tanggapan)
                <tr>
                <td>{{ $loop->iteration }}.</td>
                <td>{{ $tanggapan->getDataPengaduan->tgl_pengaduan }}</td>
                <td>{{ $tanggapan->getDataPengaduan->nik }}</td>
                <td>{{ $tanggapan->getDataPengaduan->getDataMasyarakat->nama }}</td>
                <td>{{ $tanggapan->getDataPengaduan->isi_laporan }}</td>
                <td>{{ $tanggapan->tanggapan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}


