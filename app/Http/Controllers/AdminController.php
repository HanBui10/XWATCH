<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Models\NguoiDung;

use App\Models\SanPham;
use App\Models\TinhTrang;
use App\Models\LoaiSanPham;
use App\Models\HangSanXuat;
use App\Models\BaiViet;
use App\Models\FAQ;



class AdminController extends Controller
{
    public function getHome()
    {
        /*$order = DonHang::count();
        $product = SanPham::count();
        $guest = NguoiDung::where('role', 'user')->count();
      
        $donhang = DonHang::orderBy('created_at', 'desc')->get();
        $donhang_dangxuly = Donhang::where('tinhtrang',1)->count();
        $donhang_thanhcong = Donhang::where('tinhtrang',0)->count();
        $doanhthu = DonHang::where('tinhtrang', 0)->sum('tongtien');*/

        $user = NguoiDung::where('role', 'user')->count();
        $product = SanPham::count();
        $donhang = Donhang::where('tinhtrang', 0)->sum('tongtien');
        $donhang_dangxuly = Donhang::where('tinhtrang', 1)->count();
        $donhang_thanhcong = Donhang::where('tinhtrang', 0)->count();
        /*$donhang_huy = Donhang::where('tinhtrang', 5)->count();*/

        $donhang_chitiet = Donhang_chitiet::all();
        $order = DonHang::count();

        $doanhthu = 0;
        foreach ($donhang_chitiet as $chitiet) {
            $doanhthu += $chitiet->soluongban * $chitiet->dongiaban;
        }
        $count = [$user, $doanhthu, $donhang_dangxuly, $donhang_thanhcong];
        $donhang = Donhang::where('tinhtrang', 1)->get();

        $tongLSP = LoaiSanPham::all()->count();
        $tongHSX = HangSanXuat::all()->count();
        $tongSP = SanPham::all()->count();
        $tongBV = BaiViet::all()->count();
        $tongTK = NguoiDung::where('role', 'user')->count();
        $tongFA = FAQ::all()->count();
        

        return view('admin.home', compact('count', 'order', 'donhang', 'donhang_chitiet', 'product', 'tongLSP', 'tongHSX', 'tongSP', 'tongBV', 'tongTK', 'tongFA'));





        /*return view('admin.home',compact('order', 'product', 'guest', 'doanhthu', 'donhang','donhang_dangxuly','donhang_thanhcong'));*/
    }
    
}
