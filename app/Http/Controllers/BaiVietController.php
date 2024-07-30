<?php

namespace App\Http\Controllers;

use App\Models\BinhLuanBaiViet;
use App\Models\ChuDe;
use App\Models\BaiViet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BaiVietController extends Controller
{
    public function getDanhSach()
    {

        $baiviet = BaiViet::orderBy('created_at', 'desc')->paginate(15);;
        return view('admin.baiviet.danhsach', compact('baiviet'));
    }
    public function getThem()
    {
        $chude = ChuDe::all();
        return view('admin.baiviet.them', compact('chude'));
    }
    
    public function postThem(Request $request)
    {
        
        $request->validate([
            'chude_id' => ['required', 'integer'],
            'tieude' => ['required', 'string', 'max:300', 'unique:baiviet'],
            'noidung' => ['required', 'string', 'min:20'],
        ]);
        $orm = new BaiViet();
        $orm->chude_id = $request->chude_id;
        $orm->nguoidung_id = Auth::user()->id;
        $orm->tieude = $request->tieude;
        $orm->tieude_slug = Str::slug($request->tieude, '-');
        if (!empty($request->tomtat)) $orm->tomtat = $request->tomtat;
        $orm->noidung = $request->noidung;
        $orm->save();
        return redirect()->route('admin.baiviet');
    }

    public function getSua($id)
    {
        $chude = ChuDe::all();
        $baiviet = BaiViet::find($id);
        return view('admin.baiviet.sua', compact('chude', 'baiviet'));
    }
    public function postSua(Request $request, $id)
    {
        $request->validate([
            'chude_id' => ['required', 'integer'],
            'tieude' => ['required', 'string', 'max:300', 'unique:baiviet,tieude,' . $id],
            'noidung' => ['required', 'string', 'min:20'],
        ]);
        $orm = BaiViet::find($id);
        $orm->chude_id = $request->chude_id;
        $orm->tieude = $request->tieude;
        $orm->tieude_slug = Str::slug($request->tieude, '-');
        $orm->tomtat = $request->tomtat;
        $orm->noidung = $request->noidung;
        $orm->save();
        return redirect()->route('admin.baiviet');
    }
    public function getXoa($id)
    {
        $orm = BaiViet::find($id);
        $orm->delete();
        return redirect()->route('admin.baiviet');
    }
    public function getKiemDuyet($id)
    {
        $orm = BaiViet::find($id);
        $orm->kiemduyet = 1 - $orm->kiemduyet;
        $orm->save();
        return redirect()->route('admin.baiviet');
    }
   
}
