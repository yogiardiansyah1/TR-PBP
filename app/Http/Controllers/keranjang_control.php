<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Control\ControlProduk;
use App\Http\Controllers\Control\ControlTransaksi;
use App\Http\Controllers\Control\ControlTransaksiProduk;

class keranjang_control extends Controller
{
    public function tambah(Request $req, $id_produk)
    {
        session_start();
        $qty = $req->qty;
        $produk = new ControlProduk();
        $data = $produk->getProdukById($id_produk);
        foreach ($data as $d) {
            $item = array(
                'id_produk' => $d->id_produk,
                'nama' => $d->nama,
                'harga' => $d->harga,
                'qty' => $qty,
                'subtotal' => $d->harga * $qty
            );
        }

        $duplikat = 0;
        if (isset($_SESSION['keranjang'])) {
            for ($i = 0; $i < sizeof($_SESSION['keranjang']); $i++) {
                if (isset($_SESSION['keranjang'][$i])) {
                    if ($_SESSION['keranjang'][$i]['id_produk'] == $item['id_produk']) {
                        $duplikat = 1;
                        if ($qty == '0') {
                            unset($_SESSION['keranjang'][$i]);
                        } else {
                            $_SESSION['keranjang'][$i]['qty'] = $qty;
                            $_SESSION['keranjang'][$i]['subtotal'] = $qty * $_SESSION['keranjang'][$i]['harga'];
                        }
                    }
                }
            }
            if ($duplikat == 0) {
                array_push($_SESSION['keranjang'], $item);
            }
        } else {
            $_SESSION['keranjang'] = array($item);
        }
        return redirect('/dashboard');
    }
    public function checkout(Request $req, $total)
    {
        if ($req->bayar > $total) {
            session_start();
            $transaksiObj = new ControlTransaksi();
            $transProdObj = new ControlTransaksiProduk();
            $count = $transaksiObj->getTotalTransaksiHariIni() + 1;
            $id_transaksi = substr(date("Y"), 2, 5) . date("m") . date("d") . '%04s';
            $id_transaksi = sprintf($id_transaksi, $count);
            $admin_id = $_SESSION['admin_id'];
            $dataTransaksi = [
                'id_transaksi' => $id_transaksi,
                'admin_id' => $admin_id,
                'bayar' => $req->bayar,
                'total' => $total
            ];
            $transaksiObj->insert($dataTransaksi);
            foreach ($_SESSION['keranjang'] as $item) {
                $dataTranProduk = [
                    'id_transaksi' => $id_transaksi,
                    'id_produk' => $item['id_produk'],
                    'nama' => $item['nama'],
                    'harga' => $item['harga'],
                    'qty' => $item['qty'],
                    'subtotal' => $item['subtotal']
                ];
                $transProdObj->insert($dataTranProduk);
            }
            unset($_SESSION['keranjang']);
            return redirect('/transaksi/'.$id_transaksi);
        } else {
            echo "Uang pembayaran kurang.";
        }
    }
}