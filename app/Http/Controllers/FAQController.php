<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function getDanhSach()
    {
        $faq = FAQ::all();
        return view('admin.faq.danhsach', compact('faq'));
    }

    public function getThem()
    {
        return view('admin.faq.them');
    }

    public function postThem(Request $request)
    {
        $request->validate([
            'tieude' => ['required', 'string', 'max:255'],
            'noidung' => ['required', 'string'],
        ]);

        FAQ::create($request->all());

        //$orm = new FAQ();
        //$orm->save();

        return redirect()->route('admin.faq');
    }

    public function getSua($id)
    {
        $faq = FAQ::find($id);
        return view('admin.faq.sua', compact('faq'));
    }

    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tieude' => ['required', 'string', 'max:255'],
            'noidung' => ['required', 'string'],
        ]);

        $orm = FAQ::find($id);
        $orm->tieude = $request->tieude;
        $orm->noidung = $request->noidung;
        $orm->save();
        return redirect()->route('admin.faq');
    }

    public function getXoa($id)
    {
        $orm = FAQ::find($id);
        $orm->delete();

        return redirect()->route('admin.faq');
    }
}
