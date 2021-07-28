<?php
namespace App\Http\Controllers\Control;

use Illuminate\Support\Facades\DB;

class ControlTransaksiProduk {
    public function getTransaksiProduk($id_transaksi) {
        return DB::table('transaksi_produk')->where('id_transaksi', $id_transaksi)->get();
    }

    public function insert($data) {
        return DB::table('transaksi_produk')->insert($data);
    }

}