<?php
namespace App\Http\Controllers\Control;

use Illuminate\Support\Facades\DB;

class ControlTransaksi {
    public function getAllTransaksi() {
        return DB::table('transaksi')->get();
    }

    public function getTransaksiById($id_transaksi) {
        return DB::table('transaksi')->where('id_transaksi', $id_transaksi)->get();
    }

    public function getTotalTransaksiHariIni() {
        $dateToday = substr(date("Y"),2,5).date("m").date("d");
        return DB::table('transaksi')->where('id_transaksi', 'like', '%'.$dateToday.'%')->count();
    }

    public function insert($data) {
        return DB::table('transaksi')->insert($data);
    }
}