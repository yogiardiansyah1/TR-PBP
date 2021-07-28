<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Control\ControlProduk;

class view_control extends Controller
{
    public function index() {
        $produk = new ControlProduk();
        return view('dashboard', ['produk' => $produk->getAllProduk()]);
    }
}