<?php

namespace App\Http\Controllers;

use App\Models\Logging;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->latest()->paginate(5);
        return view('pengaduan.index', compact('pengaduans'));
    }

    public function indexPetugas()
    {

        $totalAduan = Pengaduan::count();
        $aduanPending = Pengaduan::where('status', '0')->count();
        $aduanProses = Pengaduan::where('status', 'Proses')->count();
        $aduanSelesai = Pengaduan::where('status', 'Selesai')->count();

        $pengaduans = Pengaduan::latest()->with('getDataMasyarakat', 'getDataTanggapan')->paginate(5);
        $cetak = 'semua';

        return view('pengaduan.indexPetugas', compact('pengaduans', 'totalAduan', 'aduanPending', 'aduanProses', 'aduanSelesai', 'cetak'));
    }

    public function pending()
    {
        $totalAduan = Pengaduan::count();
        $aduanPending = Pengaduan::where('status', '0')->count();
        $aduanProses = Pengaduan::where('status', 'Proses')->count();
        $aduanSelesai = Pengaduan::where('status', 'Selesai')->count();

        $pengaduans = Pengaduan::where('status', '0')->with('getDataMasyarakat')->paginate(5);
        $cetak = 'pending';

        return view('pengaduan.indexPetugas', compact('pengaduans', 'totalAduan', 'aduanPending', 'aduanProses', 'aduanSelesai', 'cetak'));
    }

    public function proses()
    {
        $totalAduan = Pengaduan::count();
        $aduanPending = Pengaduan::where('status', '0')->count();
        $aduanProses = Pengaduan::where('status', 'Proses')->count();
        $aduanSelesai = Pengaduan::where('status', 'Selesai')->count();

        $pengaduans = Pengaduan::where('status', 'Proses')->with('getDataMasyarakat')->paginate(5);
        $cetak = 'proses';

        return view('pengaduan.indexPetugas', compact('pengaduans', 'totalAduan', 'aduanPending', 'aduanProses', 'aduanSelesai', 'cetak'));
    }

    public function selesai()
    {
        $totalAduan = Pengaduan::count();
        $aduanPending = Pengaduan::where('status', '0')->count();
        $aduanProses = Pengaduan::where('status', 'Proses')->count();
        $aduanSelesai = Pengaduan::where('status', 'Selesai')->count();

        $pengaduans = Pengaduan::where('status' ,'Selesai')->with('getDataMasyarakat')->paginate(5);
        $cetak = 'selesai';

        return view('pengaduan.indexPetugas', compact('pengaduans', 'totalAduan', 'aduanPending', 'aduanProses', 'aduanSelesai', 'cetak'));
    }

    public function pengaduanLanding()
    {
        $pengaduanPending = Pengaduan::where('status', '0')->with('getDataMasyarakat')->get();
        $pengaduanProses = Pengaduan::where('status', 'Proses')->with('getDataMasyarakat', 'getDataTanggapan')->get();
        $pengaduanSelesai = Pengaduan::where('status', 'Selesai')->with('getDataMasyarakat')->get();
        $totalAduan = Pengaduan::count();

        return view('welcome', compact('pengaduanPending', 'pengaduanProses', 'pengaduanSelesai'));
    }

    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tgl_pengaduan' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'image|mimes:png,jpg',
            'nik' => 'required',
        ]);


        if ($request->file('foto')) {
            $fileImage = hexdec(uniqid()) . "." . $request->foto->extension();
            Image::make($request->file('foto'))->save('assets/images/' . $fileImage);
            $pengaduanImage = 'assets/images/' . $fileImage;

            $validateData['foto'] = $pengaduanImage;
            $validateData['status'] = "0";

            Pengaduan::create($validateData);
        } else {
            $validateData['foto'] = "-";
            $validateData['status'] = "0";

            Pengaduan::create($validateData);
        }

        $createLog = new Logging;
        $createLog->nama = Auth::guard('masyarakat')->user()->nama;
        $createLog->level = 'Masyarakat';
        $createLog->aksi = 'Membuat aduan';
        $createLog->save();

        return redirect()->route('pengaduan.index')->with('success', 'Berhasil menambahkan pengaduan.');
    }

    public function edit($id)
    {
        $pengaduan = Pengaduan::find($id);
        if ($pengaduan->status == 'Selesai') {
            return back()->with('error', 'Status pengaduan sudah selesai.');
        }
        return view('pengaduan.edit', compact('pengaduan'));
    }

    public function update(Request $request, $id)
    {
        if ($request->file('foto')) {
            $fileImage = hexdec(uniqid()) . "." . $request->foto->extension();
            Image::make($request->file('foto'))->save('assets/images/' . $fileImage);
            $pengaduanImage = 'assets/images/' . $fileImage;

            $data = Pengaduan::findOrFail($id);
            $data->tgl_pengaduan = $request->tgl_pengaduan;
            $data->isi_laporan = $request->isi_laporan;
            $data->foto = $pengaduanImage;
            $data->update();
        } else {
            $data = Pengaduan::findOrFail($id);
            $data->tgl_pengaduan = $request->tgl_pengaduan;
            $data->isi_laporan = $request->isi_laporan;
            $data->foto = $request->foto_lama;
            $data->update();
        }

        $createLog = new Logging;
        $createLog->nama = Auth::guard('masyarakat')->user()->nama;
        $createLog->level = 'Masyarakat';
        $createLog->aksi = 'Mengubah aduan';
        $createLog->save();

        return redirect()->route('pengaduan.index')->with('success', 'Berhasil mengubah pengaduan.');
    }

    public function delete($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $tanggapan = Tanggapan::where('id_pengaduan', $id);
        if ($pengaduan && $tanggapan) {
            $pengaduan->delete();
            $tanggapan->delete();
            if (Auth::guard('masyarakat')->user()) {

                $createLog = new Logging;
                $createLog->nama = Auth::guard('masyarakat')->user()->nama;
                $createLog->level = 'Masyarakat';
                $createLog->aksi = 'Menghapus aduan';
                $createLog->save();

                return redirect()->route('pengaduan.index')->with('success', 'Berhasil menghapus pengaduan.');
            }

            $createLog = new Logging;
            $createLog->nama = Auth::guard('petugas')->user()->nama;
            $createLog->level = Auth::guard('petugas')->user()->level;;
            $createLog->aksi = 'Menghapus aduan';
            $createLog->save();

            return redirect()->route('pengaduan.indexPetugas')->with('success', 'Berhasil menghapus pengaduan.');
        }
        return redirect()->route('pengaduan.index')->with('error', 'Gagal menghapus pengaduan.');
    }

    public function pengaduanPDF($cetak)
    {   
        if($cetak == 'semua') {
            $pengaduans = pengaduan::latest()->with('getDataMasyarakat')->get();
        }elseif($cetak == 'pending'){
            $pengaduans = pengaduan::where('status', '0')->with('getDataMasyarakat')->get();
        } elseif ($cetak == 'proses') {
            $pengaduans = pengaduan::where('status', 'proses')->with('getDataMasyarakat')->get();
        } else {
            $pengaduans = pengaduan::where('status', 'selesai')->with('getDataMasyarakat')->get();
        }

        $admin = Auth::guard('petugas')->user()->nama;

        $data = [
            'judul' => 'Generate Tanggapan dan Pengaduan',
            'admin' => $admin,
            'pengaduans' => $pengaduans,
        ];
        // return $pengaduans;

        $pdf = Pdf::loadView('tanggapan.generate_pdf', $data)->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
    