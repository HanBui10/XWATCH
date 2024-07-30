<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Imports\LoaiSanPhamImport;
use App\Exports\LoaiSanPhamExport;
use Maatwebsite\Excel\Facades\Excel;
class LoaiSanPhamController extends Controller
{
    public function postNhap(Request $request)
	{
		Excel::import(new LoaiSanPhamImport, $request->file('file_excel'));
		return redirect()->route('admin.loaisanpham');
	}
	// Xuất ra Excel
	public function getXuat()
	{
		return Excel::download(new LoaiSanPhamExport, 'loai-san-pham.xlsx');
	}
    public function getDanhSach()
    {
        $loaisanpham = LoaiSanPham::all();
        return view('admin.loaisanpham.danhsach', compact('loaisanpham'));
    }
    public function getThem()
    {
        return view('admin.loaisanpham.them');
    }
    public function postThem(Request $request)
    {
        
        $request->validate([
            'tenloai' => ['required', 'string', 'max:191', 'unique:loaisanpham'],
        ]);

        $orm = new LoaiSanPham();
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-');
        $orm->save();
        return redirect()->route('admin.loaisanpham');
    }
    public function getSua($id)
    {
        $loaisanpham = LoaiSanPham::find($id);
        return view('admin.loaisanpham.sua', compact('loaisanpham'));
    }
    public function postSua(Request $request, $id)
    {
       
        $request->validate([
            'tenloai' => ['required', 'string', 'max:191', 'unique:loaisanpham,tenloai,' . $id],
        ]);

        $orm = LoaiSanPham::find($id);
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-');
        $orm->save();
        return redirect()->route('admin.loaisanpham');
    }
    public function getXoa($id)
    {
        $orm = LoaiSanPham::find($id);
        $orm->delete();
        return redirect()->route('admin.loaisanpham');
    }
}
