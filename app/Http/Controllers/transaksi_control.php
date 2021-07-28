<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Control\ControlTransaksi;
use App\Http\Controllers\Control\ControlTransaksiProduk;

class transaksi_control extends Controller
{
    public function index()
    {
        $transaksiObj = new ControlTransaksi();
        return view('transaksi/index', ['transaksi' => $transaksiObj->getAllTransaksi()]);
    }

    public function detail($id_transaksi)
    {
        $transaksiObj = new ControlTransaksi();
        $transaksiProdObj = new ControlTransaksiProduk();
        $data = $transaksiProdObj->getTransaksiProduk($id_transaksi);

        foreach ($data as $d) {
            $id_transaksi = $d->id_transaksi;
            break;
        }
        $transaksi = $transaksiObj->getTransaksiById($id_transaksi);
        foreach ($transaksi as $t) {
            $bayar = $t->bayar;
            $total = $t->total;
            break;
        }
        return view('transaksi/detail', [
            'transaksi_produk' => $data,
            'id_transaksi' => $id_transaksi,
            'bayar' => $bayar, 'total' => $total
        ]);
    }
}