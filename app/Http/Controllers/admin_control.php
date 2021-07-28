<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Control\ControlAdmin;

class admin_control extends Controller
{
    public function login()
    {
        return view('admin/login');
    }

    public function login_cek(Request $req)
    {
        $admin = new ControlAdmin();
        if($admin->cekLogin($req->admin_id, $req->passwd) == 1) {
            session_start();
            $_SESSION['admin_id'] = $req->admin_id;
            return redirect('/dashboard');
        } else {
            return redirect('/admin/login');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        return redirect('/admin/login');
    }
}