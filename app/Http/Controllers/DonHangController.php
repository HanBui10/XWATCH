<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Models\TinhTrang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function getDanhSach()
    {
        $donhang = DonHang::orderBy('created_at', 'desc')->get();
        return view('admin.donhang.danhsach', compact('donhang'));
    }
    public function getThem()
    {
        // Đặt hàng bên Front-end
    }
    public function postThem(Request $request)
    {
        // Xử lý đặt hàng bên Front-end
    }
    function tinhtrang_capnhat($id){
        Donhang::where('id',$id)->update([
            'tinhtrang' => 0,
        ]);
        return redirect()->route('admin.donhang')->with('status','Bạn đã xử lý đơn hàng thành công');
    }
}
