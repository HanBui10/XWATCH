<?php

namespace App\Http\Controllers;

use App\Models\ChuDe;
use App\Models\BaiViet;
use App\Models\NguoiDung;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Mail\DatHangThanhCongEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\LoaiSanPham;
use App\Models\HangSanXuat;
use App\Models\SanPham;
use App\Models\SanPhamChiTiet;
use App\Models\FAQ;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\LienHe;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Slider;



class HomeController extends Controller
{
    public function getHome()
    {
        
        
        $loaisanpham = LoaiSanPham::all();
        $hangsanxuat = HangSanXuat::all();
        $slider = Slider::all();
        $sanpham = SanPham::paginate(8);
        $sanpham_new = SanPham::orderBy('id','desc')->get(); 
        
        return view('frontend.home', compact('loaisanpham', 'hangsanxuat', 'slider', 'sanpham','sanpham_new'));
    }
    public function getSanPham($tenloai_slug = '')
    {
        
        $loaisanpham = LoaiSanPham::where('tenloai_slug', $tenloai_slug)->first();
        $sanpham = SanPham::where('loaisanpham_id', $loaisanpham->id)->paginate(8);

        $loaisanpham_seach = LoaiSanPham::where('tenloai_slug', $tenloai_slug)->first();
      
        return view('frontend.sanpham', compact('sanpham', 'loaisanpham_seach'));
    }
    public function getSanPham_ChiTiet($tenloai_slug = '', $tensanpham_slug = '')
    {
        
        $sanpham = SanPham::join('loaisanpham', 'sanpham.loaisanpham_id', '=', 'loaisanpham.id')
            ->where('loaisanpham.tenloai_slug', $tenloai_slug)
            ->where('sanpham.tensanpham_slug', $tensanpham_slug)
            ->first();

        
        if (!$sanpham) {
            abort(404); // Trả về trang 404 Not Found
        }

        $daxem = 'SP' . $sanpham->id;
        if (!session()->has($daxem)) {
            //$sanpham->luotxem_sp += 1;
            $sanpham->save();
            session()->put($daxem, 1);
        }
        $sanpham_search = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();
        $sanphamct = SanPhamChiTiet::where('sanpham_id', $sanpham_search->id)->first();
       
        return view('frontend.sanpham_chitiet', compact('sanpham', 'sanphamct'));
       
        
    }
    public function getBaiViet($tenchude_slug = '')
    {
        if (empty($tenchude_slug)) {
            $title = 'Tin tức';
            $baiviet = BaiViet::where('kiemduyet', 1)
               
                ->orderBy('created_at', 'desc')
                ->paginate(6);
        } else {
            $chude = ChuDe::where('tenchude_slug', $tenchude_slug)
                ->firstOrFail();
            $title = $chude->tenchude;
            $baiviet = BaiViet::where('kiemduyet', 1)
                
                ->where('chude_id', $chude->id)
                ->orderBy('created_at', 'desc')
                ->paginate(4);
        }
        return view('frontend.baiviet', compact('title', 'baiviet'));
    }
    public function getBaiViet_ChiTiet($tenchude_slug = '', $tieude_slug = '')
    {
        $tieude_id = explode('.', $tieude_slug);
        $tieude = explode('-', $tieude_id[0]);
        $baiviet_id = $tieude[count($tieude) - 1];
        $baiviet = BaiViet::where('kiemduyet', 1)
           
            ->where('id', $baiviet_id)
            ->firstOrFail();
        if (!$baiviet) abort(404);
        // Cập nhật lượt xem
        $daxem = 'BV' . $baiviet_id;
        if (!session()->has($daxem)) {
            $orm = BaiViet::find($baiviet_id);
            $orm->luotxem = $baiviet->luotxem + 1;
            $orm->save();
            session()->put($daxem, 1);
        }
        $baivietcungchuyemuc = BaiViet::where('kiemduyet', 1)
           
            ->where('chude_id', $baiviet->chude_id)
            ->where('id', '!=', $baiviet_id)
            ->orderBy('created_at', 'desc')
            ->take(4)->get();
        return view('frontend.baiviet_chitiet', compact('baiviet', 'baivietcungchuyemuc'));
    }
    public function getGioHang()
    {
        if (Cart::count() > 0)
            return view('frontend.giohang');
        else
            return view('frontend.giohangrong');
    }
    public function lichsudonhang(){
        $donhang = DonHang::where('nguoidung_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $donhang_chitiet = DonHang_ChiTiet::all();   
        return view('frontend.lichsudonhang', compact('donhang', 'donhang_chitiet'));
    }

    function cancel_order(Request $request)
    {
        $donhang_id = $request->input('donhang_id');
        $nguoidung_id = Auth::user()->id;
        DonHang::where('nguoidung_id', $nguoidung_id)->where('id', $donhang_id)->update([
            'tinhtrang' => "5",
        ]);
        $id = $request->input('id');
        $donhang_chitiet = DonHang_ChiTiet::whereIn('id', $id)->get();
        $sanpham = SanPham::all();
        // cập nhật số lượng sản phẩm từ đơn hàng đã hủy
        foreach ($sanpham as $value) {
            $total = 0;
            foreach ($donhang_chitiet as $key => $row) {
                if ($value->id == $row->sanpham_id) {
                    $total += $row->soluongban;
                    SanPham::where('id', $value->id)->update([
                        'soluong' => $value->soluong + $total,
                    ]);
                }
            }
        }
        return redirect()->back()->with('status', 'Bạn đã hủy đơn hàng thành công');
    }
    public function getGioHang_Them($tensanpham_slug = '', Request $request)
    {
        $soluong = $request->input('soluong');
        $sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();
        if (!empty($soluong)) {
            Cart::add([
                'id' => $sanpham->id,
                'name' => $sanpham->tensanpham,
                'price' => $sanpham->giamoi,
                'qty' => $soluong,
                'weight' => 0,
                'options' => [
                    'image' => $sanpham->hinhanh
                ]
            ]);
        } else {
            Cart::add([
                'id' => $sanpham->id,
                'name' => $sanpham->tensanpham,
                'price' => $sanpham->giamoi,
                'qty' => 1,
                'weight' => 0,
                'options' => [
                    'image' => $sanpham->hinhanh
                ]
            ]);
        }
        return redirect()->route('frontend.home');
    }
    public function getGioHang_Xoa($row_id)
    {

        Cart::remove($row_id);
        return redirect()->route('frontend.giohang');
    }
    public function getGioHang_Giam($row_id)
    {
        $row = Cart::get($row_id);
        // Nếu số lượng là 1 thì không giảm được nữa
        if ($row->qty > 1) {
            Cart::update($row_id, $row->qty - 1);
        }
        return redirect()->route('frontend.giohang');
    }
    public function getGioHang_Tang($row_id)
    {
        $row = Cart::get($row_id);
        // Không được tăng vượt quá 10 sản phẩm
        if ($row->qty < 10) {
            Cart::update($row_id, $row->qty + 1);
        }
        return redirect()->route('frontend.giohang');
    }
    public function postGioHang_CapNhat(Request $request)
    {
        foreach ($request->qty as $row_id => $quantity) {
            if ($quantity <= 0)
                Cart::update($row_id, 1);
            else if ($quantity > 10)
                Cart::update($row_id, 10);
            else
                Cart::update($row_id, $quantity);
        }
        return redirect()->route('frontend.giohang');
    }
    function giohangtatca()
    {
        Cart::destroy();
        return redirect()->route('frontend.giohang')->with('status', 'Đã xóa giỏ hàng thành công');
    }
   
    public function getGioiThieu()
    {
        return view('frontend.gioithieu');
    }
    public function getLienHe()
    {
        return view('frontend.lienhe');
    }
    public function getFAQ()
    {
        $lienhe = FAQ::all();
        return view('frontend.faq',compact('lienhe'));
    }

    // Trang đăng ký dành cho khách hàng
    public function getDangKy()
    {
        return view('user.dangky');
    }
    // Trang đăng nhập dành cho khách hàng
    public function getDangNhap()
    {
        return view('user.dangnhap');
    }

    

    public function getGoogleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
    public function getGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')
                ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
                ->stateless()
                ->user();
        } catch (Exception $e) {
            return redirect()->route('user.dangnhap')->with('warning', 'Lỗi xác thực. Xin vui lòng thử lại!');
        }
        $existingUser = NguoiDung::where('email', $user->email)->first();
        if ($existingUser) {
            // Nếu người dùng đã tồn tại thì đăng nhập
            Auth::login($existingUser, true);
            return redirect()->route('user.home');
        } else {
            // Nếu chưa tồn tại người dùng thì thêm mới
            $newUser = NguoiDung::create([
                'name' => $user->name,
                'email' => $user->email,
                'username' => Str::before($user->email, '@'),
                'password' => Hash::make('xwatch@2024'), // Gán mật khẩu tự do
            ]);
            // Sau đó đăng nhập
            Auth::login($newUser, true);
            if (Auth::user()->role == "admin") {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('frontend.home');
            }
            // return redirect()->route('trangchu');
            // return redirect()->route('frontend.home');
        }
    }
    public function getFacebookLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }

    

    public function getSearch(Request $request)
    {
        $keyword = $request->input('keyword');
        $sanpham = SanPham::where('tensanpham', 'like', '%' . $keyword . '%')
            ->with('loaisanpham')
            ->paginate(10);

        return view('frontend.search', ['sanpham' => $sanpham]);
    }

    public function getSlider(Request $request)
    {
        return view('frontend.slider');
    }
    
}
