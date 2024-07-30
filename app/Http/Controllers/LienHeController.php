<?php

namespace App\Http\Controllers;

use App\Models\LienHe;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class LienHeController extends Controller

{
    public function getLienHe(Request $request)
    {
        return view('lienhe');
    }
    public function getDanhSach()
    {
        $lienhe = LienHe::all();
        return view('admin.lienhe.danhsach', compact('lienhe'));
    }
    public function getThem()
    {
        // Đặt hàng bên Front-end
    }
    public function postThem(Request $request)
    {
        // Xử lý đặt hàng bên Front-end
    }

    public function getSua($id)
    {
        $lienhe = LienHe::find($id);

        return view('admin.lienhe.sua', compact('lienhe'));
    }
    public function postLienHe(Request $request)
    {


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);


        LienHe::create($request->all());
        
        
        return redirect()->back()->with('success', 'Chúng tôi đã nhận thông báo và sẽ sớm phản hồi bạn, cảm ơn bạn!!!');

        
    }
    public function getXoa($id)
    {
        $orm = LienHe::find($id);
        $orm->delete();
        return redirect()->route('admin.lienhe');
    }
    public function getKiemDuyet($id)
    {
        $orm = LienHe::find($id);
        $orm->kiemduyet = 1 - $orm->kiemduyet;
        $orm->save();
        return redirect()->route('admin.lienhe');
    }
}
