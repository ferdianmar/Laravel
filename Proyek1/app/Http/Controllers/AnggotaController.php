<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Jabatan;
use App\Exports\ExportAnggota;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexs()
    {
        $batas = 5;
        $jumlah_anggota = Anggota::count();
        $anggota = Anggota::with('jabatan')->latest()->paginate($batas);
        $no = $batas * ($anggota->currentPage() - 1);
        return view('anggota.index', compact('anggota', 'no', 'jumlah_anggota'));
        // return view('admin.datauser', ['anggota' => Anggota::get()]);
    }

    public function index2()
    {
        $batas = 5;
        $jumlah_anggota = Anggota::count();
        $anggota = Anggota::with('jabatan')->latest()->paginate($batas);
        $no = $batas * ($anggota->currentPage() - 1);
        return view('karyawan.anggota.index', compact('anggota', 'no', 'jumlah_anggota'));
        // return view('admin.datauser', ['anggota' => Anggota::get()]);
    }

    public function create()
    {
        $data = Anggota::count();
        $alpa = Jabatan::pluck('nama_posisi', 'id');
        return view('anggota.create', compact('data', 'alpa'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
        ]);

        $anggota = new Anggota;
        $anggota->id = $request->kode;
        $anggota->nama = $request->nama;
        $anggota->posisi = $request->posisi;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->alamat = $request->alamat;
        $anggota->no_hp = $request->no_hp;
        $anggota->email = $request->email;

        if ($request->hasFile('gambar')) {
            $file       = $request->file('gambar');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('anggota', $filename);
            $anggota->gambar = $filename;
        } else {
            return $request;
            $anggota->gambar = '';
        }
        $anggota->save();
        return redirect('/anggotax')->with('status', 'Data Karyawan Berhasil Di Buat.');
        // $anggota = new Anggota;
        // $anggota->id = $request->kode;
        // $anggota->nama = $request->nama;
        // $anggota->posisi = $request->posisi;
        // $anggota->jenis_kelamin = $request->jk;
        // $anggota->alamat = $request->alamat;
        // $anggota->no_hp = $request->no_hp;
        // $anggota->email = $request->email;
        // $anggota->save();

    }
    public function edit($id)
    {
        $anggota = Anggota::find($id);
        $data = Anggota::count();
        $alpa = Jabatan::pluck('nama_posisi', 'id');
        return view('anggota.edit', compact('anggota', 'data', 'alpa'));
    }

    public function update(Request $request, $id)
    {

        Anggota::find($id)
            ->update($request->all());
        return redirect('/anggotax')->with('pesan', 'Data berhasil diupdate');
        // $anggota = Anggota::find($id);
        // $anggota->id = $request->kode;
        // $anggota->nama = $request->nama;
        // $anggota->posisi = $request->posisi;
        // $anggota->jenis_kelamin = $request->jk;
        // $anggota->alamat = $request->alamat;
        // $anggota->no_hp = $request->no_hp;
        // $anggota->email = $request->email;
        // $anggota->update();

    }
    public function destroy($id)
    {
        Anggota::find($id)
            ->delete();
        return redirect('/anggotax')->with('pesan', 'Data berhasil dihapus');
    }


    public function detail($id)
    {
        $anggota = Anggota::find($id);

        return view('karyawan.anggota.detail', compact('anggota'));
    }

    // public function search(Request $request)
    // {
    //     $batas = 5;
    //     $cari = $request->kata;

    //     $anggotas = Anggota::where('nama', 'like', "%" . $cari . "%")
    //         ->orwhere('id', 'like', "%" . $cari . "%")
    //         ->orwhere('posisi', 'like', "%" . $cari . "%")
    //         ->orwhere('alamat', 'like', "%" . $cari . "%")
    //         ->orwhere('jenis_kelamin', 'like', "%" . $cari . "%")
    //         ->orwhere('no_hp', 'like', "%" . $cari . "%")
    //         ->orwhere('email', 'like', "%" . $cari . "%");

    //     $anggota = $anggotas->paginate($batas);

    //     $jumlah_anggota = $anggotas->get()->count();
    //     $no = $batas * ($anggota->currentPage() - 1);
    //     return view('anggota.search', compact('anggota', 'no', 'cari', 'jumlah_anggota'));
    // }

    // public function exportAnggota()
    // {
    //     return Excel::download(new exportAnggota, 'data_anggota.xlsx');
    // }
    // // public function pdfAnggota()
    // // {
    // //     $anggota = Anggota::all();
    // //     return view('anggota.pdfAnggota', compact('anggota'));
    // // }
}
