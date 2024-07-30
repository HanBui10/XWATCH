<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\SanPham;
use App\Models\SanPhamChiTiet;
use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use App\Models\HangSanXuat;
use App\Imports\SanPhamChiTietImport;
//use Excel;
use App\Exports\SanPhamChiTietExport;
use Maatwebsite\Excel\Facades\Excel;

class SanPhamChiTietController extends Controller
{

    // Nhập từ Excel
    public function postNhap(Request $request)
    {
        Excel::import(new SanPhamChiTietImport, $request->file('file_excel'));
        return redirect()->route('admin.sanphamchitiet');
    }
    // Xuất ra Excel
    public function getXuat()
    {
        return Excel::download(new SanPhamChiTietExport, 'danh-sach-san-pham-chi-tiet.xlsx');
    }

    public function getDanhSach()
    {
        $sanphamchitiet = SanPhamChiTiet::paginate(10);
        return view('admin.sanphamchitiet.danhsach', compact('sanphamchitiet'));
    }

    public function getThem()
    {
        $loaisanpham = LoaiSanPham::all();
        $hangsanxuat = HangSanXuat::all();
        $sanpham = SanPham::all();
        return view('admin.sanphamchitiet.them', compact('sanpham', 'loaisanpham', 'hangsanxuat'));
    }

    public function postThem(Request $request)
    {
        
        $this->validate($request, [
            'sanpham_id' => ['required'],
            'model' => ['required'],
            'mausac' => ['required'],
            'congnghemanhinh' => ['required'],
            'kichthuocmanhinh' => ['required'],
            'dophangiai' => ['required'],
            'bonho' => ['required'],
            'chatlieu' => ['required'],
            'trongluong' => ['required'],
            'tinhtrang' => ['required'],
            'baohanh' => ['required'],


        ]);

        $orm = new SanPhamChiTiet();
        $orm->sanpham_id = $request->sanpham_id;
        $orm->model = $request->model;
        $orm->mausac = $request->mausac;
        $orm->congnghemanhinh = $request->congnghemanhinh;
        $orm->kichthuocmanhinh = $request->kichthuocmanhinh;

        $orm->dophangiai = $request->dophangiai;
        $orm->bonho = $request->bonho;
        $orm->chatlieu = $request->chatlieu;
        $orm->trongluong = $request->trongluong;
        $orm->tinhtrang = $request->tinhtrang;
        $orm->baohanh = $request->baohanh;

        $orm->save();

       
        return redirect()->route('admin.sanphamchitiet');
    }

    public function getSua($id)
    {
        $sanphamchitiet = SanPhamChiTiet::find($id);
        
        $loaisanpham = LoaiSanPham::all();
        $hangsanxuat = HangSanXuat::all();
        $sanpham = SanPham::all();
        return view('admin.sanphamchitiet.sua', compact('sanpham', 'loaisanpham', 'hangsanxuat', 'sanphamchitiet'));
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'sanpham_id' => ['required'],
            'model' => ['required'],
            'mausac' => ['required'],
            'congnghemanhinh' => ['required'],
            'kichthuocmanhinh' => ['required'],
            'dophangiai' => ['required'],
            'bonho' => ['required'],
            'chatlieu' => ['required'],
            'trongluong' => ['required'],
            'tinhtrang' => ['required'],
            'baohanh' => ['required'],


        ]);


        $orm = SanPhamChiTiet::find($id);
        $orm->sanpham_id = $request->sanpham_id;
        $orm->model = $request->model;
        $orm->mausac = $request->mausac;
        $orm->congnghemanhinh = $request->congnghemanhinh;
        $orm->kichthuocmanhinh = $request->kichthuocmanhinh;
        $orm->dophangiai = $request->dophangiai;
        $orm->bonho = $request->bonho;
        $orm->chatlieu = $request->chatlieu;
        $orm->trongluong = $request->trongluong;
        $orm->tinhtrang = $request->tinhtrang;
        $orm->baohanh = $request->baohanh;
        $orm->save();

       
        return redirect()->route('admin.sanphamchitiet');
    }

    public function getXoa($id)
    {
        $orm = SanPhamChiTiet::find($id);
        $orm->delete();


        return redirect()->route('admin.sanphamchitiet');
    }
   
}
