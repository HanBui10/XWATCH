<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NguoiDungController extends Controller
{
    public function getDanhSach()
    {
        $nguoidung = NguoiDung::all();
        return view('admin.nguoidung.danhsach', compact('nguoidung'));
    }
    public function getThem()
    {
        return view('admin.nguoidung.them');
    }
    public function postThem(Request $request)
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:nguoidung'],
            'role' => ['required'],
            'password' => ['required', 'min:4', 'confirmed'],
        ]);
        $path='';
        if($request->hasFile('image_user'))
        {
            $extension = $request->file('image_user')->extension();
            $filename = Str::slug($request->name, '-') . '.' . $extension;
            $path = Storage::putFileAs('User_Image', $request->file('image_user'), $filename);
        }
        $orm = new NguoiDung();
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        $orm->password = Hash::make($request->password);
        $orm->role = $request->role;
        $orm->address = $request->address;
        $orm->phone = $request->phone;
        if(!empty($path))
            $orm->image_user=$path;
        $orm->save();
       
        return redirect()->route('admin.nguoidung');
    }
    public function getSua($id)
    {
        $nguoidung = NguoiDung::find($id);
        return view('admin.nguoidung.sua', compact('nguoidung'));
    }
    public function postSua(Request $request, $id)
    {
       
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:nguoidung,email,' . $id],
            'role' => ['required'],
            'password' => ['confirmed'],
        ]);
        $path='';
        if($request->hasFile('image_user'))
        {
            $extension = $request->file('image_user')->extension();
            $filename = Str::slug($request->name, '-') . '.' . $extension;
            $path = Storage::putFileAs('User_Image', $request->file('image_user'), $filename);
        }
        $orm = NguoiDung::find($request->id);
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        $orm->role = $request->role;
        if (!empty($request->password)) $orm->password = Hash::make($request->password);
        $orm->address = $request->address;
        $orm->phone = $request->phone;
        if(!empty($path))
            $orm->image_user=$path;
        $orm->save();
        
        return redirect()->route('admin.nguoidung');
    }
    public function getXoa($id)
    {
        $orm = NguoiDung::find($id);
        $orm->delete();

        
        return redirect()->route('admin.nguoidung');
    }

    
}
