<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\HangSanXuatController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChuDeController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\SanPhamChiTietController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\FAQController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Đăng ký, đăng nhập, Quên mật khẩu
Auth::routes();
// Google OAuth
Route::get('/login/facebook', [HomeController::class, 'getFacebookLogin'])->name('facebook.login');
Route::get('/login/facebook/callback', [HomeController::class, 'getFacebookCallback'])->name('facebook.callback');
// Google OAuth
Route::get('/login/google', [HomeController::class, 'getGoogleLogin'])->name('google.login');
Route::get('/login/google/callback', [HomeController::class, 'getGoogleCallback'])->name('google.callback');
// Các trang dành cho khách chưa đăng nhập
Route::name('frontend.')->group(function () {
    // Trang chủ
    Route::get('/', [HomeController::class, 'getHome'])->name('home');
    Route::get('/home', [HomeController::class, 'getHome'])->name('home');
    // Trang sản phẩm
    Route::get('/san-pham', [HomeController::class, 'getSanPham'])->name('sanpham');
    Route::get('/san-pham/{tenloai_slug}', [HomeController::class, 'getSanPham'])->name('sanpham.phanloai');
    Route::get('/san-pham/{tenloai_slug}/{tensanpham_slug}', [HomeController::class, 'getSanPham_ChiTiet'])->name('sanpham.chitiet');
    // Tin tức
    Route::get('/bai-viet', [HomeController::class, 'getBaiViet'])->name('baiviet');
    Route::get('/bai-viet/{tenchude_slug}', [HomeController::class, 'getBaiViet'])->name('baiviet.chude');
    Route::get('/bai-viet/{tenchude_slug}/{tieude_slug}', [HomeController::class, 'getBaiViet_ChiTiet'])->name('baiviet.chitiet');
    // Trang giỏ hàng
    Route::get('/gio-hang', [HomeController::class, 'getGioHang'])->name('giohang');
    Route::get('/lich-su-don-hang', [HomeController::class, 'lichsudonhang'])->name('lichsudonhang');
    Route::post('/huy-don-hang', [HomeController::class, 'cancel_order'])->name('cancel.order');

    Route::get('/gio-hang/them/{tensanpham_slug}', [HomeController::class, 'getGioHang_Them'])->name('giohang.them');
    Route::get('/gio-hang/xoa/{row_id}', [HomeController::class, 'getGioHang_Xoa'])->name('giohang.xoa');
    Route::get('/gio-hang/giam/{row_id}', [HomeController::class, 'getGioHang_Giam'])->name('giohang.giam');
    Route::get('/gio-hang/tang/{row_id}', [HomeController::class, 'getGioHang_Tang'])->name('giohang.tang');
    Route::post('/gio-hang/cap-nhat', [HomeController::class, 'postGioHang_CapNhat'])->name('giohang.capnhat');
    Route::get('/gio-hang/tat-ca', [HomeController::class, 'giohangtatca'])->name('giohang.tatca');
    // Liên hệ
    Route::get('/lien-he', [HomeController::class, 'getLienHe'])->name('lienhe');
    Route::post('/lien-he', [LienHeController::class, 'postLienHe'])->name('postLienHe');
    // Đăng xuất
    Route::post('/dang-xuat', [HomeController::class, 'postDangXuat'])->name('dangxuat');

    // Giới thiệu
    Route::get('/gioi-thieu', [HomeController::class, 'getGioiThieu'])->name('gioithieu');

    //Tìm kiếm
    Route::get('/search', [HomeController::class, 'getSearch'])->name('search');

    //FAQ
    Route::get('/faq', [HomeController::class, 'getFAQ'])->name('faq');

});
// Trang khách hàng
Route::get('/khach-hang/dang-ky', [HomeController::class, 'getDangKy'])->name('user.dangky');
Route::get('/khach-hang/dang-nhap', [HomeController::class, 'getDangNhap'])->name('user.dangnhap');
Route::get('/ho-so-ca-nhan', [KhachHangController::class, 'getHoSoCaNhan'])->name('hosocanhan');
Route::post('cap-nhat/ho-so-ca-nhan', [KhachHangController::class, 'postHoSoCaNhan'])->name('user.hosocanhan');
Route::get('/dat-hang', [KhachHangController::class, 'getDatHang'])->name('user.dathang');
Route::post('/dat-hang', [KhachHangController::class, 'postDatHang'])->name('user.dathang');
Route::get('/dat-hang-thanh-cong', [KhachHangController::class, 'getDatHangThanhCong'])->name('user.dathangthanhcong');
Route::post('/danhgiasanpham', [KhachHangController::class, 'postDanhGiaSanPham'])->name('frontend.postDanhGiaSanPham');

// Trang tài khoản khách hàng
Route::prefix('khach-hang')->name('user.')->middleware(['auth', 'user'])->group(function () {
    // Trang chủ
    Route::get('/', [KhachHangController::class, 'getHome'])->name('home');
    Route::get('/home', [KhachHangController::class, 'getHome'])->name('home');

    // Đặt hàng


    // Xem và cập nhật trạng thái đơn hàng
    Route::get('/don-hang', [KhachHangController::class, 'getDonHang'])->name('donhang');
    Route::get('/don-hang/{id}', [KhachHangController::class, 'getDonHang'])->name('donhang.chitiet');
    Route::post('/don-hang/{id}', [KhachHangController::class, 'postDonHang'])->name('donhang.chitiet');
    // Cập nhật thông tin tài khoản


    // Đăng xuất
    Route::post('/dang-xuat', [KhachHangController::class, 'postDangXuat'])->name('dangxuat');

    // Liên hệ
    Route::post('/lien-he', [KhachHangController::class, 'getLienHe'])->name('lienhe');


});
// Trang tài khoản quản lý
Route::prefix('admin')->name('admin.')->middleware(['auth', 'manager'])->group(function () {
    // Trang chủ
    Route::get('/', [AdminController::class, 'getHome'])->name('home');
    Route::get('/home', [AdminController::class, 'getHome'])->name('home');
    Route::post('/dang-xuat', [AdminController::class, 'postDangXuat'])->name('dangxuat');
    
    // Quản lý Loại sản phẩm
    Route::get('/loaisanpham', [LoaiSanPhamController::class, 'getDanhSach'])->name('loaisanpham');
    Route::get('/loaisanpham/them', [LoaiSanPhamController::class, 'getThem'])->name('loaisanpham.them');
    Route::post('/loaisanpham/them', [LoaiSanPhamController::class, 'postThem'])->name('loaisanpham.them');
    Route::get('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'getSua'])->name('loaisanpham.sua');
    Route::post('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'postSua'])->name('loaisanpham.sua');
    Route::get('/loaisanpham/xoa/{id}', [LoaiSanPhamController::class, 'getXoa'])->name('loaisanpham.xoa');
    Route::post('/loaisanpham/nhap', [LoaiSanPhamController::class, 'postNhap'])->name('loaisanpham.nhap');
    Route::get('/loaisanpham/xuat', [LoaiSanPhamController::class, 'getXuat'])->name('loaisanpham.xuat');
    // Quản lý Hãng sản xuất
    Route::get('/hangsanxuat', [HangSanXuatController::class, 'getDanhSach'])->name('hangsanxuat');
    Route::get('/hangsanxuat/them', [HangSanXuatController::class, 'getThem'])->name('hangsanxuat.them');
    Route::post('/hangsanxuat/them', [HangSanXuatController::class, 'postThem'])->name('hangsanxuat.them');
    Route::get('/hangsanxuat/sua/{id}', [HangSanXuatController::class, 'getSua'])->name('hangsanxuat.sua');
    Route::post('/hangsanxuat/sua/{id}', [HangSanXuatController::class, 'postSua'])->name('hangsanxuat.sua');
    Route::get('/hangsanxuat/xoa/{id}', [HangSanXuatController::class, 'getXoa'])->name('hangsanxuat.xoa');
    Route::post('/hangsanxuat/nhap', [HangSanXuatController::class, 'postNhap'])->name('hangsanxuat.nhap');
    Route::get('/hangsanxuat/xuat', [HangSanXuatController::class, 'getXuat'])->name('hangsanxuat.xuat');
    // Quản lý Sản phẩm
    Route::get('/sanpham', [SanPhamController::class, 'getDanhSach'])->name('sanpham');
    Route::get('/sanpham/them', [SanPhamController::class, 'getThem'])->name('sanpham.them');
    Route::post('/sanpham/them', [SanPhamController::class, 'postThem'])->name('sanpham.them');
    Route::get('/sanpham/sua/{id}', [SanPhamController::class, 'getSua'])->name('sanpham.sua');
    Route::post('/sanpham/sua/{id}', [SanPhamController::class, 'postSua'])->name('sanpham.sua');
    Route::get('/sanpham/xoa/{id}', [SanPhamController::class, 'getXoa'])->name('sanpham.xoa');
    Route::post('/sanpham/nhap', [SanPhamController::class, 'postNhap'])->name('sanpham.nhap');
    Route::get('/sanpham/xuat', [SanPhamController::class, 'getXuat'])->name('sanpham.xuat');
    // Quản lý Đơn hàng
    Route::get('/donhang', [DonHangController::class, 'getDanhSach'])->name('donhang');
    Route::get('/donhang/them', [DonHangController::class, 'getThem'])->name('donhang.them');
    Route::post('/donhang/them', [DonHangController::class, 'postThem'])->name('donhang.them');
    Route::get('/donhang/sua/{id}', [DonHangController::class, 'getSua'])->name('donhang.sua');
    Route::post('/donhang/sua/{id}', [DonHangController::class, 'postSua'])->name('donhang.sua');
    Route::get('/donhang/xoa/{id}', [DonHangController::class, 'getXoa'])->name('donhang.xoa');
    Route::get('/xu-ly-tinh-trang/{id}', [DonHangController::class, 'tinhtrang_capnhat'])->name('tinhtrang_capnhat');
    // Quản lý Tài khoản người dùng
    Route::get('/nguoidung', [NguoiDungController::class, 'getDanhSach'])->name('nguoidung');
    Route::get('/nguoidung/them', [NguoiDungController::class, 'getThem'])->name('nguoidung.them');
    Route::post('/nguoidung/them', [NguoiDungController::class, 'postThem'])->name('nguoidung.them');
    Route::get('/nguoidung/sua/{id}', [NguoiDungController::class, 'getSua'])->name('nguoidung.sua');
    Route::post('/nguoidung/sua/{id}', [NguoiDungController::class, 'postSua'])->name('nguoidung.sua');
    Route::get('/nguoidung/xoa/{id}', [NguoiDungController::class, 'getXoa'])->name('nguoidung.xoa');
    // Quản lý Chủ đề
    Route::get('/chude', [ChuDeController::class, 'getDanhSach'])->name('chude');
    Route::get('/chude/them', [ChuDeController::class, 'getThem'])->name('chude.them');
    Route::post('/chude/them', [ChuDeController::class, 'postThem'])->name('chude.them');
    Route::get('/chude/sua/{id}', [ChuDeController::class, 'getSua'])->name('chude.sua');
    Route::post('/chude/sua/{id}', [ChuDeController::class, 'postSua'])->name('chude.sua');
    Route::get('/chude/xoa/{id}', [ChuDeController::class, 'getXoa'])->name('chude.xoa');
    // Quản lý Bài viết
    Route::get('/baiviet', [BaiVietController::class, 'getDanhSach'])->name('baiviet');
    Route::get('/baiviet/them', [BaiVietController::class, 'getThem'])->name('baiviet.them');
    Route::post('/baiviet/them', [BaiVietController::class, 'postThem'])->name('baiviet.them');
    Route::get('/baiviet/sua/{id}', [BaiVietController::class, 'getSua'])->name('baiviet.sua');
    Route::post('/baiviet/sua/{id}', [BaiVietController::class, 'postSua'])->name('baiviet.sua');
    Route::get('/baiviet/xoa/{id}', [BaiVietController::class, 'getXoa'])->name('baiviet.xoa');
    Route::get('/baiviet/kiemduyet/{id}', [BaiVietController::class, 'getKiemDuyet'])->name('baiviet.kiemduyet');
    Route::get('/baiviet/kichhoat/{id}', [BaiVietController::class, 'getKichHoat'])->name('baiviet.kichhoat');

    // Quản lý liên hệ
    Route::get('/lienhe', [LienHeController::class, 'getDanhSach'])->name('lienhe');
    Route::get('/lienhe/sua', [LienHeController::class, 'getSua'])->name('lienhe.sua');
    Route::get('/lienhe/xoa/{id}', [LienHeController::class, 'getXoa'])->name('lienhe.xoa');
    Route::get('/lienhe/kiemduyet/{id}', [LienHeController::class, 'getKiemDuyet'])->name('lienhe.kiemduyet');

    // Quản lý Sản phẩm chi tiết
    Route::get('/sanphamchitiet', [SanPhamChiTietController::class, 'getDanhSach'])->name('sanphamchitiet');
    Route::get('/sanphamchitiet/them', [SanPhamChiTietController::class, 'getThem'])->name('sanphamchitiet.them');
    Route::post('/sanphamchitiet/them', [SanPhamChiTietController::class, 'postThem'])->name('sanphamchitiet.them');
    Route::get('/sanphamchitiet/sua/{id}', [SanPhamChiTietController::class, 'getSua'])->name('sanphamchitiet.sua');
    Route::post('/sanphamchitiet/sua/{id}', [SanPhamChiTietController::class, 'postSua'])->name('sanphamchitiet.sua');
    Route::get('/sanphamchitiet/xoa/{id}', [SanPhamChiTietController::class, 'getXoa'])->name('sanphamchitiet.xoa');
    Route::post('/sanphamchitiet/nhap', [SanPhamChiTietController::class, 'postNhap'])->name('sanphamchitiet.nhap');
    Route::get('/sanphamchitiet/xuat', [SanPhamChiTietController::class, 'getXuat'])->name('sanphamchitiet.xuat');
   
    // Quản lý Slider
    Route::get('/slider', [SliderController::class, 'getDanhSach'])->name('slider');
    Route::get('/slider/them', [SliderController::class, 'getThem'])->name('slider.them');
    Route::post('/slider/them', [SliderController::class, 'postThem'])->name('slider.them');
    Route::get('/slider/sua/{id}', [SliderController::class, 'getSua'])->name('slider.sua');
    Route::post('/slider/sua/{id}', [SliderController::class, 'postSua'])->name('slider.sua');
    Route::get('/slider/xoa/{id}', [SliderController::class, 'getXoa'])->name('slider.xoa');

    // Quản lý FAQ
    Route::get('/faq', [FAQController::class, 'getDanhSach'])->name('faq');
    Route::get('/faq/them', [FAQController::class, 'getThem'])->name('faq.them');
    Route::post('/faq/them', [FAQController::class, 'postThem'])->name('faq.them');
    Route::get('/faq/sua/{id}', [FAQController::class, 'getSua'])->name('faq.sua');
    Route::post('/faq/sua/{id}', [FAQController::class, 'postSua'])->name('faq.sua');
    Route::get('/faq/xoa/{id}', [FAQController::class, 'getXoa'])->name('faq.xoa');

   
});
