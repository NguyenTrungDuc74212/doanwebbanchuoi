<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\addSlideRequest;


class SliderController extends Controller
{
    public function manage_banner()
    {
    	$slide = Slider::orderBy('id','DESC')->paginate(5);
    	return view('admin.slider.list_slide', compact('slide'));
    }
    public function add_slide()
    {
    	return view('admin.slider.add_slide');
    }
    public function insert_slide(addSlideRequest $req)
    {
        $slide = new Slider;
        $slide->name = $req->input('name');
        $slide->desc = $req->input('desc');
        $slide->status = $req->input('status');
        /*xử lý image*/
		$file = $req->file('image');
		$name_offical = $file->getClientOriginalName();
		$name_jpg = explode(".", $name_offical);
		$file_name =$name_jpg[0].rand(0,99).".".$file->getClientOriginalExtension();
		$url = $file->move('public/upload/slide',$file_name);
		$slide->image = $file_name;
		/*end*/
		$slide->save();
		return redirect()->route('manage_banner')->with('thongbao','thêm slide thành công');
    }
    public function delete_slide($id)
    {
    	$slide = Slider::find($id);
    	$slide->delete();
    	return redirect()->route('manage_banner')->with('thongbao','Xóa slide thành công');

    }
    public function anSlide($id)
	{
		$slide = Slider::find($id);
		$slide->status = 0;
		$slide->save();
		return redirect()->back()->with('thongbao','ẩn slide thành công');

	}
	public function hienSlide($id)
	{
		$slide = Slider::find($id);
		$slide->status = 1;
		$slide->save();
		return redirect()->back()->with('thongbao','kích hoạt slide thành công');
	}
}
