<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        if(auth()->user()->level != 1){
            return abort(404);
        }
        return view('admin.index');
    }


    //Profile
    public function profile()
    {   
        if(auth()->user()->level != 1){
            return abort(404);
        }
        $user  = User::where('id', Auth::user()->id)->first();
        return view('admin.profile', compact('user'));
    }

    public function edit_profile()
    {
        if(auth()->user()->level != 1){
            return abort(404);
        }
        $user  = User::where('id', Auth::user()->id)->first();
        return view('admin.edit', compact('user'));
    }

    //Transaksi
    public function selesai()
    {   
        if(auth()->user()->level != 1){
            return abort(404);
        }
        $transaksi = Pesanan::leftJoin('pesanan_details', 'pesanan_details.pesanan_id', '=', 'pesanans.id')
            ->leftJoin('users', 'users.id', '=', 'pesanans.user_id')->where('status', 3)->orderBy('pesanans.updated_at', 'desc')->get();
        return view('admin.selesai', compact('transaksi'));
    }

    public function sudah()
    {   
        if(auth()->user()->level != 1){
            return abort(404);
        }
        $transaksi = Pesanan::leftJoin('pesanan_details', 'pesanan_details.pesanan_id', '=', 'pesanans.id')
            ->leftJoin('users', 'users.id', '=', 'pesanans.user_id')->where('status', 2)->orderBy('pesanans.updated_at', 'desc')->get();
        return view('admin.sudah', compact('transaksi'));
    }

    public function belum()
    {   
        if(auth()->user()->level != 1){
            return abort(404);
        }
        $transaksi = Pesanan::leftJoin('pesanan_details', 'pesanan_details.pesanan_id', '=', 'pesanans.id')
            ->leftJoin('users', 'users.id', '=', 'pesanans.user_id')->where('status', 1)->orderBy('pesanans.updated_at', 'desc')->get();
        return view('admin.belum', compact('transaksi'));
    }
    

    public function detail($id)
    {
        if(auth()->user()->level != 1){
            return abort(404);
        }
        $pesanans  = Pesanan::where('id', $id)->first();
        $pesanan_detail = PesananDetail::where('pesanan_id', $pesanans->id)->get();
        return view('admin.detail', compact('pesanans', 'pesanan_detail'));
    }

    public function terima_order($id)
    {
        $pesanan2 = Pesanan::where('id', $id)->first();
        if (!empty($pesanan2)) {
            $pesanan2->status = 2;
            $pesanan2->update();
        }
        alert()->success('', 'Pengambilan Order Berhasil !');
        return redirect('/admin/transaksi/belom');
    }

    //User

    public function user()
    {   
        if(auth()->user()->level != 1){
            return abort(404);
        }
        $user = User::orderBy('level', 'asc')->get();
        return view('admin.user', compact('user'));
    }

    public function topup($id)
    {
        if(auth()->user()->level != 1){
            return abort(404);
        }
        $user  = User::where('id', $id)->first();
        return view('admin.topup', compact('user'));
    }

    public function upsaldo(Request $request, $id)
    {
        User::where('id', $id)
            ->update([
                'saldo' => $request->saldo,
            ]);
        alert()->success('Tengkyu :)', 'Profile Berhasil Di Update');
        return redirect('/admin/user');
        
    }

    //Menu
    public function menu()
    {   
        if(auth()->user()->level != 1){
            return abort(404);
        }
        $menu = Barang::orderBy('id', 'asc')->get();
        return view('admin.menu', compact('menu'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_barang' => 'required',
                'harga' => 'required',
                'stok' => 'required',
                'stok' => 'required',
            ]
        );
        $produk = new Barang;
        $produk->nama_barang = $request->nama_barang;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->ket = $request->ket;
        if ($request->hasFile('gambar')) {
            $file       = $request->file('gambar');
            $extension   = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('barang', $filename);
            $produk->gambar = $filename;
        } else {
            return $request;
            $produk->gambar = '';
        }
        $produk->save();
        alert()->success('', 'Barang Berhasil Di Tambahkan');
        return redirect('/admin/menu');
    }

    public function editmenu($id)
    {
        if(auth()->user()->level != 1){
            return abort(404);
        }
        $menu  = Barang::where('id', $id)->first();
        return view('admin.editmenu', compact('menu'));
    }

    public function updatemenu(Request $request, $id)
    {
        Barang::where('id', $id)
            ->update([
                'nama_barang' => $request->nama_barang,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'ket' => $request->ket,
            ]);
        alert()->success('Tengkyu :)', 'Profile Berhasil Di Update');
        return redirect('/admin/menu');
        
    }

    public function destroy($id)
    {
        Barang::find($id)
            ->delete();
        return redirect('/admin/menu')->with('pesan', 'Data berhasil dihapus');
    }




}
