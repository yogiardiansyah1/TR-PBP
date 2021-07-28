<?php

namespace App\Http\Controllers\Control;

use Illuminate\Support\Facades\DB;

class ControlProduk
{
    public function getAllProduk()
    {
        return DB::table('produk')->get();
    }

    public function getProdukById($id)
    {
        return DB::table('produk')->where('id_produk', $id)->get();
    }

    public function getProdukByName($name)
    {
        return DB::table('produk')->where('nama', 'like', '%' . $name . '%')->get();
    }

    public function insertProduk($produk)
    {
        DB::table('produk')->insert($produk);
    }

    public function update($id_produk, $data)
    {
        DB::table('produk')->where('id_produk', $id_produk)->update($data);
    }

    public function delete($id_produk)
    {
        return DB::table('produk')->where('id_produk', $id_produk)->delete();
    }
}
