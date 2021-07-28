<?php
namespace App\Http\Controllers\Control;

use Illuminate\Support\Facades\DB;

class ControlAdmin {
    public function cekLogin($admin_id, $password) {
        $admin = DB::table('admin')->where('admin_id', $admin_id)->get();
        foreach ($admin as $data) {
            if ($data->password == $password) {
                return 1;
            } else {
                return 0;
            }
        }
    }
}