<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\HangSanXuat;
use App\Models\SanPhamChiTiet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
//use Excel;
use App\Imports\SanPhamImport;
use App\Exports\SanPhamExport;
use Maatwebsite\Excel\Facades\Excel;



class SanPhamController extends Controller
{
	public function postNhap(Request $request)
	{
		Excel::import(new SanPhamImport, $request->file('file_excel'));
		return redirect()->route('admin.sanpham');
	}
	// Xuất ra Excel
	public function getXuat()
	{
		return Excel::download(new SanPhamExport, 'san-pham.xlsx');
	}

	public function getDanhSach()
	{
		$sanpham = SanPham::paginate(10);;
		return view('admin.sanpham.danhsach', compact('sanpham'));
	}

	public function getThem()
	{
		$loaisanpham = LoaiSanPham::all();
		$hangsanxuat = HangSanXuat::all();
		return view('admin.sanpham.them', compact('loaisanpham', 'hangsanxuat'));
	}

	public function postThem(Request $request)
	{
		$this->validate($request, [
			'loaisanpham_id' => ['required'],
			'hangsanxuat_id' => ['required'],
			'tensanpham' => ['required', 'string', 'max:191', 'unique:sanpham'],
			'soluong' => ['required', 'numeric'],
			'giamoi' => ['required', 'numeric'],
			'giacu' => ['required', 'numeric'],
			'hinhanh' => ['nullable', 'image', 'max:2048'],
			'hinhanh1' => ['nullable', 'image', 'max:2048'],
			'hinhanh2' => ['nullable', 'image', 'max:2048'],
		]);

		function uploadImage($file, $loaisanpham_id, $tensanpham)
		{
			// Tìm loại sản phẩm
			$lsp = LoaiSanPham::find($loaisanpham_id);

			// Tạo thư mục nếu chưa có
			if (!File::isDirectory($lsp->tenloai_slug)) {
				Storage::makeDirectory($lsp->tenloai_slug, 0775);
			}

			// Xác định tên tập tin
			$extension = $file->extension();
			$filename = Str::slug($tensanpham, '-') . '_' . uniqid() . '.' . $extension;

			// Upload vào thư mục và trả về đường dẫn
			return Storage::putFileAs($lsp->tenloai_slug, $file, $filename);
		}

		$path = '';
		if ($request->hasFile('hinhanh')) {
			$path = uploadImage($request->file('hinhanh'), $request->loaisanpham_id, $request->tensanpham);
		}

		$path1 = '';
		if ($request->hasFile('hinhanh1')) {
			$path1 = uploadImage($request->file('hinhanh1'), $request->loaisanpham_id, $request->tensanpham);
		}

		$path2 = '';
		if ($request->hasFile('hinhanh2')) {
			$path2 = uploadImage($request->file('hinhanh2'), $request->loaisanpham_id, $request->tensanpham);
		}

		$orm = new SanPham();
		$orm->loaisanpham_id = $request->loaisanpham_id;
		$orm->hangsanxuat_id = $request->hangsanxuat_id;
		$orm->tensanpham = $request->tensanpham;
		$orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
		$orm->soluong = $request->soluong;
		$orm->giamoi = $request->giamoi;
		$orm->giacu = $request->giacu;
		if (!empty($path)) $orm->hinhanh = $path;
		if (!empty($path1)) $orm->hinhanh1 = $path1;
		if (!empty($path2)) $orm->hinhanh2 = $path2;
		$orm->motasanpham = $request->motasanpham;
		$orm->doinetsanpham = $request->doinetsanpham;
		$orm->save();

		return redirect()->route('admin.sanpham');
	}


	public function getSua($id)
	{
		$sanpham = SanPham::find($id);
		$loaisanpham = LoaiSanPham::all();
		$hangsanxuat = HangSanXuat::all();
		return view('admin.sanpham.sua', compact('sanpham', 'loaisanpham', 'hangsanxuat'));
	}

	public function postSua(Request $request, $id)
	{
		$this->validate($request, [
			'loaisanpham_id' => ['required'],
			'hangsanxuat_id' => ['required'],
			'tensanpham' => ['required', 'string', 'max:191', 'unique:sanpham,tensanpham,' . $id],
			'soluong' => ['required', 'numeric'],
			'giamoi' => ['required', 'numeric'],
			'giacu' => ['required', 'numeric'],
			'hinhanh' => ['nullable', 'image', 'max:2048'],
			'hinhanh1' => ['nullable', 'image', 'max:2048'],
			'hinhanh2' => ['nullable', 'image', 'max:2048'],
		]);

		function uploadImage($file, $loaisanpham_id, $tensanpham)
		{
			// Tìm loại sản phẩm
			$lsp = LoaiSanPham::find($loaisanpham_id);

			// Tạo thư mục nếu chưa có
			if (!File::isDirectory($lsp->tenloai_slug)) {
				Storage::makeDirectory($lsp->tenloai_slug, 0775);
			}

			// Xác định tên tập tin
			$extension = $file->extension();
			$filename = Str::slug($tensanpham, '-') . '_' . uniqid() . '.' . $extension;

			// Upload vào thư mục và trả về đường dẫn
			return Storage::putFileAs($lsp->tenloai_slug, $file, $filename);
		}

		$orm = SanPham::find($id);

		$orm->loaisanpham_id = $request->loaisanpham_id;
		$orm->hangsanxuat_id = $request->hangsanxuat_id;
		$orm->tensanpham = $request->tensanpham;
		$orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
		$orm->soluong = $request->soluong;
		$orm->giamoi = $request->giamoi;
		$orm->giacu = $request->giacu;

		if ($request->hasFile('hinhanh')) {
			if (!empty($orm->hinhanh)) {
				Storage::delete($orm->hinhanh);
			}
			$orm->hinhanh = uploadImage($request->file('hinhanh'), $request->loaisanpham_id, $request->tensanpham);
		}

		if ($request->hasFile('hinhanh1')) {
			if (!empty($orm->hinhanh1)) {
				Storage::delete($orm->hinhanh1);
			}
			$orm->hinhanh1 = uploadImage($request->file('hinhanh1'), $request->loaisanpham_id, $request->tensanpham);
		}

		if ($request->hasFile('hinhanh2')) {
			if (!empty($orm->hinhanh2)) {
				Storage::delete($orm->hinhanh2);
			}
			$orm->hinhanh2 = uploadImage($request->file('hinhanh2'), $request->loaisanpham_id, $request->tensanpham);
		}

		$orm->motasanpham = $request->motasanpham;
		$orm->doinetsanpham = $request->doinetsanpham;
		$orm->save();

		return redirect()->route('admin.sanpham');
	}

	public function getXoa($id)
	{
		$orm = SanPham::find($id);
		$orm->delete();


		if (!empty($orm->hinhanh)) Storage::delete($orm->hinhanh);

		return redirect()->route('admin.sanpham');
	}
}
