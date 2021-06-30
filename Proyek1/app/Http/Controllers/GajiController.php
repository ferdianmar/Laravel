<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportGaji;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Gaji;
use App\Models\Jabatan;

use Illuminate\Support\Facades\Auth;


class GajiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $batas = 5;
        $jumlah_gaji = Gaji::count();
        $gaji = Gaji::with('jabatan', 'anggota')->paginate($batas);
        $no = $batas * ($gaji->currentPage() - 1);
        return view('gaji.index', compact('gaji', 'no', 'jumlah_gaji'));
    }

    public function index2()
    {
        $batas = 5;
        $jumlah_gaji = Gaji::count();
        $gaji = Gaji::with('jabatan', 'anggota')->paginate($batas);
        $no = $batas * ($gaji->currentPage() - 1);
        return view('karyawan.gaji.index', compact('gaji', 'no', 'jumlah_gaji'));
    }

    public function ambilupdate($id)
    {
        Gaji::find($id)
            ->update([
                'keterangan' => 'Lunas',
            ]);
        return redirect('/gaji');
    }

    public function ambilupdate2($id)
    {
        Gaji::find($id)
            ->update([
                'keterangan' => 'Lunas',
            ]);
        return redirect('/gajis');
    }





    public function create()
    {
        $data = Gaji::count();
        $alpa = Jabatan::pluck('nama_posisi', 'id');
        $alpa2 = Anggota::pluck('nama', 'id');
        return view('gaji.create', compact('data', 'alpa', 'alpa2'));
    }
    public function store(Request $request)
    {


        $gaji = new Gaji;
        $gaji->id = $request->kode;
        $gaji->nama = $request->nama;
        $gaji->posisi = $request->posisi;
        $gaji->gaji = $request->gaji;
        $gaji->lembur = $request->lembur;
        $gaji->total_gaji = $request->gaji + $request->lembur;
        $gaji->tanggal = $request->tanggal;
        $gaji->keterangan = $request->keterangan;
        $gaji->save();
        return redirect('/gaji')->with('pesan', 'Data berhasil disimpan');
    }
    public function edit($id)
    {
        $gaji = Gaji::find($id);
        $data = Gaji::count();
        $alpa = Jabatan::pluck('nama_posisi', 'id');
        $alpa2 = Anggota::pluck('nama', 'id');
        return view('gaji.edit', compact('gaji', 'data', 'alpa', 'alpa2'));
    }
    public function update(Request $request, $id)
    {
        $gaji = Gaji::find($id);
        $gaji->id = $request->kode;
        $gaji->nama = $request->nama;
        $gaji->posisi = $request->posisi;
        $gaji->gaji = $request->gaji;
        $gaji->lembur = $request->lembur;
        $gaji->total_gaji = $request->gaji + $request->lembur;
        $gaji->tanggal = $request->tanggal;
        $gaji->keterangan = $request->keterangan;
        $gaji->update();
        return redirect('/gaji')->with('pesan', 'Data berhasil diupdate');
    }
    public function destroy($id)
    {
        Gaji::find($id)
            ->delete();
        return redirect('/gaji')->with('pesan', 'Data berhasil dihapus');
    }

    // public function search(Request $request)
    // {
    //     $batas = 5;
    //     $cari = $request->kata;

    //     $gajis = Gaji::where('nama', 'like', "%" . $cari . "%")
    //         ->orwhere('posisi', 'like', "%" . $cari . "%")
    //         ->orwhere('gaji', 'like', "%" . $cari . "%")
    //         ->orwhere('total_gaji', 'like', "%" . $cari . "%")
    //         ->orwhere('tanggal', 'like', "%" . $cari . "%")
    //         ->orwhere('keterangan', 'like', "%" . $cari . "%")
    //         ->orwhere('id', 'like', "%" . $cari . "%");

    //     $gaji = $gajis->paginate($batas);

    //     $jumlah_gaji = $gajis->get()->count();
    //     $no = $batas * ($gaji->currentPage() - 1);
    //     return view('gaji.search', compact('gaji', 'no', 'cari', 'jumlah_gaji'));
    // }

    // public function exportGaji()
    // {
    //     return Excel::download(new exportGaji, 'data_gaji.xlsx');
    // }


    public function cetak($id)
    {
        $gaji = Gaji::find($id);

        return view('karyawan.gaji.cetakGaji', compact('gaji'));
    }
}
