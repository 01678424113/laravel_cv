<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    //
    public function getDanhsach()
    {
        $theloai = TheLoai::all();
        return view('theloai.danhsach',['theloai'=>$theloai]);
    }

    // function thêm thể loại
    public function getThem()
    {
        return view('theloai.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'Ten'=>'required|min:3|max:30|unique:TheLoai,Ten'
            ],
            [
                'Ten.required'=>'Chưa nhập tên thể loại',
                'Ten.min'=>'Tên có 3-30 kí tự',
                'Ten.max'=>'Tên có 3-30 kí tự',
                'Ten.unique'=>'Tên đã tồn tại'
            ]);
        $theloai = new TheLoai;
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Thêm thành công');
    }
}
