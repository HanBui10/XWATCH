<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Mail\DatHangThanhCongEmail;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\DanhGiasanPham;

class KhachHangController extends Controller
{
    public function getHome()
    {
        if (Auth::check()) {
            $nguoidung = NguoiDung::find(Auth::user()->id);
            return view('user.hosocanhan', compact('nguoidung'));
        } else
            return redirect()->route('user.dangnhap');
    }
    public function getDatHang()
    {
        if (Auth::check())
            return view('user.dathang');
        else
            return redirect()->route('user.dangnhap');
    }
    public function postDatHang(Request $request)
    {
        // Kiểm tra
        $this->validate($request, [
            'diachigiaohang' => ['required', 'string', 'max:255'],
            'dienthoaigiaohang' => ['required', 'string', 'max:255'],
        ]);
        // Lưu vào đơn hàng
        $dh = new DonHang();
        $dh->nguoidung_id = Auth::user()->id;
        $dh->tinhtrang = 1; // Đơn hàng mới
        $dh->tongtien = Cart::priceTotal();
        $dh->diachigiaohang = $request->diachigiaohang;
        $dh->dienthoaigiaohang = $request->dienthoaigiaohang;
        $dh->save();
        // Lưu vào đơn hàng chi tiết
        foreach (Cart::content() as $value) {
            $ct = new DonHang_ChiTiet();
            $ct->donhang_id = $dh->id;
            $ct->sanpham_id = $value->id;
            $ct->soluongban = $value->qty;
            $ct->dongiaban = $value->price;
            $ct->save();
        }
        Mail::to(Auth::user()->email)->send(new DatHangThanhCongEmail($dh));
        return redirect()->route('user.dathangthanhcong');
    }
    public function getDatHangThanhCong()
    {
        // Xóa giỏ hàng khi hoàn tất đặt hàng?
        Cart::destroy();
        return view('user.dathangthanhcong');
    }
    public function getDonHang($id = '')
    {
        if (Auth::check()) {
            /*$tinhtrang = TinhTrang::all();*/
            $nguoidung = NguoiDung::find(Auth::user()->id);
            $donhang = DonHang::all();
            return view('user.donhang', compact('donhang', 'nguoidung', 'tinhtrang'));
        } else
            return redirect()->route('user.dangnhap');
    }
    public function postDonHang(Request $request, $id)
    {
        // 
    }
    public function getHoSoCaNhan()
    {
        $nguoidung = Auth::user();
        // 
        return view('user.hosocanhan', compact('nguoidung'));
    }
    public function postHoSoCaNhan(Request $request)
    {
        // 
        $id = Auth::user()->id;
        $request->validate([
            'name' => ['required', 'string', 'max:100'],

            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('nguoidung')->ignore($id)],
            'address' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:100'],
            'password' => ['confirmed'],

        ]);
        $path = '';
        if ($request->hasFile('image_user')) {
            $extension = $request->file('image_user')->extension();
            $filename = Str::slug($request->name, '-') . '.' . $extension;
            $path = Storage::putFileAs('User_Image', $request->file('image_user'), $filename);
        }

        $orm = NguoiDung::find($id);
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        $orm->address = $request->address;
        $orm->phone = $request->phone;
        if (!empty($request->password)) $orm->password = Hash::make($request->password);
        if (!empty($path))
            $orm->image_user = $path;
        $orm->save();
        return redirect()->back()->with('success', 'Đã cập nhật thông tin thành công.');
    }
    public function postDangXuat(Request $request)
    {

        return redirect()->route('frontend.home');
    }

    public function getLienHe(Request $request)
    {

        return redirect()->route('user.lienhe');
    }
    
}
