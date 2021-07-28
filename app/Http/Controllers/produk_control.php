<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Control\ControlProduk;
use Illuminate\Http\Request;

class produk_control extends Controller
{
    public function index()
    {
        $produk = new ControlProduk();
        return view('produk/index', ['produk' => $produk->getAllProduk()]);
    }

    public function tambah()
    {
        return view('produk/tambah');
    }

    public function insert(Request $req)
    {
        session_start();
        $admin_id = $_SESSION['admin_id'];
        $produk = new ControlProduk();
        $p = [
                'id_produk' => $req->id_produk,
                'nama' => $req->nama,
                'harga' => $req->harga,
                'persediaan' => $req->persediaan,
                'admin_id' => $admin_id
        ];
        $produk->insertProduk($p);
        return redirect('/produk');
    }

    public function delete($id_produk) {
        $produk = new ControlProduk();
        $produk->delete($id_produk);
        return redirect('/produk');
    }

    public function cari(Request $req) {
        $produk = new ControlProduk();
        return view('/dashboard', ['produk' => $produk->getProdukByName($req->cari)]);
    }
    public function edit($id) {
        $produkObj = new ControlProduk();
        // $data = $produkObj->getProdukById($id)[0];
        // print_r($data);
        return view('produk/edit', ['produk' => $produkObj->getProdukById($id)[0]]);
    }

    public function simpan(Request $req, $id) {
        $produkObj = new ControlProduk();
        $data = [
            'harga' => $req->harga,
            'persediaan' => $req->stok
        ];
        $produkObj->update($id,$data);
        return redirect('/produk');
    }
    
}