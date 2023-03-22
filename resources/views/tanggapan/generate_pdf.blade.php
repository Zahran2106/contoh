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
      @foreach ($pengaduans as $pengaduan)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $pengaduan->tgl_pengaduan }}</td>
          <td>{{ $pengaduan->nik }}</td>
          <td>{{ $pengaduan->getDataMasyarakat->nama }}</td>
          <td>{{ $pengaduan->isi_laporan }}</td>
          <td>{{ $pengaduan->status}}</td>
        </tr>
      @endforeach
		</tbody>
	</table>
 
</body>
</html>



