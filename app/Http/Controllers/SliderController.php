<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class SliderController extends Controller
{

    public function getDanhSach()
    {
        $slider = Slider::paginate(5);
        return view('admin.slider.danhsach', compact('slider'));
    }

    public function getThem()
    {
        return view('admin.slider.them');
    }

    public function postThem(Request $request)
    {
        
        $this->validate($request, [

            'anh1' => ['nullable', 'image',],
            'anh2' => ['nullable', 'image',],
            'anh3' => ['nullable', 'image',],
            'anh4' => ['nullable', 'image',],
            'anh5' => ['nullable', 'image',],


        ]);

        // Upload hình ảnh
        $name_file_1 = Str::random(3);
        $name_file_2 = Str::random(3);
        $name_file_3 = Str::random(3);
        $name_file_4 = Str::random(3);
        $name_file_5 = Str::random(3);

        $path1 = '';
        if ($request->hasFile('anh1')) {
            $extension = $request->file('anh1')->extension();
            $filename = $name_file_1 . '.' . $extension;
            $path1 = Storage::putFileAs('slider', $request->file('anh1'), $filename);
        }

        $path2 = '';
        if ($request->hasFile('anh2')) {
            $extension = $request->file('anh2')->extension();
            $filename = $name_file_2 . '.' . $extension;
            $path2 = Storage::putFileAs('slider', $request->file('anh2'), $filename);
        }

        $path3 = '';
        if ($request->hasFile('anh3')) {
            $extension = $request->file('anh3')->extension();
            $filename = $name_file_3 . '.' . $extension;
            $path3 = Storage::putFileAs('slider', $request->file('anh3'), $filename);
        }

        $path4 = '';
        if ($request->hasFile('anh4')) {
            $extension = $request->file('anh4')->extension();
            $filename = $name_file_4 . '.' . $extension;
            $path4 = Storage::putFileAs('slider', $request->file('anh4'), $filename);
        }

        $path5 = '';
        if ($request->hasFile('anh5')) {
            $extension = $request->file('anh5')->extension();
            $filename = $name_file_5 . '.' . $extension;
            $path5 = Storage::putFileAs('slider', $request->file('anh5'), $filename);
        }

        $orm = new Slider();

        if (!empty($path1)) $orm->anh1 = $path1;
        if (!empty($path2)) $orm->anh2 = $path2;
        if (!empty($path3)) $orm->anh3 = $path3;
        if (!empty($path4)) $orm->anh4 = $path4;
        if (!empty($path5)) $orm->anh5 = $path5;


        $orm->save();

       
        return redirect()->route('admin.slider');
    }

    public function getSua($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.sua', compact('slider'));
    }

    public function postSua(Request $request, $id)
    {
       
        $this->validate($request, [

            'anh1' => ['nullable', 'image',],
            'anh2' => ['nullable', 'image',],
            'anh3' => ['nullable', 'image',],
            'anh4' => ['nullable', 'image',],
            'anh5' => ['nullable', 'image',],



        ]);

  
        // Upload hình ảnh
        $name_file_1 = Str::random(3);
        $name_file_2 = Str::random(3);
        $name_file_3 = Str::random(3);
        $name_file_4 = Str::random(3);
        $name_file_5 = Str::random(3);

        $path1 = '';
        if ($request->hasFile('anh1')) {
            $extension = $request->file('anh1')->extension();
            $filename = $name_file_1 . '.' . $extension;
            $path1 = Storage::putFileAs('slider', $request->file('anh1'), $filename);
        }

        $path2 = '';
        if ($request->hasFile('anh2')) {
            $extension = $request->file('anh2')->extension();
            $filename = $name_file_2 . '.' . $extension;
            $path2 = Storage::putFileAs('slider', $request->file('anh2'), $filename);
        }

        $path3 = '';
        if ($request->hasFile('anh3')) {
            $extension = $request->file('anh3')->extension();
            $filename = $name_file_3 . '.' . $extension;
            $path3 = Storage::putFileAs('slider', $request->file('anh3'), $filename);
        }

        $path4 = '';
        if ($request->hasFile('anh4')) {
            $extension = $request->file('anh4')->extension();
            $filename = $name_file_4 . '.' . $extension;
            $path4 = Storage::putFileAs('slider', $request->file('anh4'), $filename);
        }

        $path5 = '';
        if ($request->hasFile('anh5')) {
            $extension = $request->file('anh5')->extension();
            $filename = $name_file_5 . '.' . $extension;
            $path5 = Storage::putFileAs('slider', $request->file('anh5'), $filename);
        }

        $orm = Slider::find($id);

        if (!empty($path1)) $orm->anh1 = $path1;
        if (!empty($path2)) $orm->anh2 = $path2;
        if (!empty($path3)) $orm->anh3 = $path3;
        if (!empty($path4)) $orm->anh4 = $path4;
        if (!empty($path5)) $orm->anh5 = $path5;


        $orm->save();

        return redirect()->route('admin.slider');
    }

    public function getXoa($id)
    {
        $orm = Slider::find($id);
        $orm->delete();


        if (!empty($orm->anh)) Storage::delete($orm->anh1);

        return redirect()->route('admin.slider');
    }
}
