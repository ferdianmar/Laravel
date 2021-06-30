<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Auth;

class JabatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $batas = 5;
        $jumlah_jabatan = Jabatan::count();
        $jabatan = Jabatan::orderBy('id', 'asc')->paginate($batas);
        $no = $batas * ($jabatan->currentPage() - 1);
        return view('jabatan.index', compact('jabatan', 'no', 'jumlah_jabatan'));
    }

    public function index2()
    {
        $batas = 5;
        $jumlah_jabatan = Jabatan::count();
        $jabatan = Jabatan::orderBy('id', 'asc')->paginate($batas);
        $no = $batas * ($jabatan->currentPage() - 1);
        return view('karyawan.jabatan.index', compact('jabatan', 'no', 'jumlah_jabatan'));
    }

    public function create()
    {
        return view('jabatan.create');
    }
    public function store(Request $request)
    {
        $jabatan = new Jabatan;
        $jabatan->id = $request->kode;
        $jabatan->nama_posisi = $request->nama_posisi;
        $jabatan->save();
        return redirect('/jabatan')->with('pesan', 'Data berhasil disimpan');
    }
    public function edit($id)
    {
        $jabatan = Jabatan::find($id);
        return view('jabatan.edit', compact('jabatan'));
    }
    public function update(Request $request, $id)
    {
        Jabatan::find($id)
        ->update($request->all());
        return redirect('/jabatan')->with('pesan', 'Data berhasil diupdate');
    }
    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();
        return redirect('/jabatan')->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->kata;

        $jabatans = Jabatan::where('nama_posisi', 'like', "%" . $cari . "%")
            ->orwhere('id', 'like', "%" . $cari . "%");

        $jabatan = $jabatans->paginate($batas);

        $jumlah_jabatan = $jabatans->get()->count();
        $no = $batas * ($jabatan->currentPage() - 1);
        return view('jabatan.search', compact('jabatan', 'no', 'cari', 'jumlah_jabatan'));
    }

    // public function exportJabatan()
    // {
    //     return Excel::download(new exportJabatan, 'data_jabatan.xlsx');
    // }
    // // public function pdfJabatan()
    // // {
    // //     $jabatan = Jabatan::all();
    //     return view('jabatan.pdfJabatan', compact('jabatan'));
    // }
}
