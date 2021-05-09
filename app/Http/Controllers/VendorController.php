<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendors;
use App\Http\Requests\addVendorRequest;
use App\Http\Requests\editVendorRequest;

class VendorController extends Controller
{
    public function list_vendor()
    {
    	$vendor = Vendors::all();
    	return view('admin.vendor.list_vendor',compact('vendor'));
    }
    public function insert_vendor(){
    	return view('admin.vendor.add_vendor');
    }
    public function save_vendor(addVendorRequest $req){
        $vendor = new Vendors;
        $vendor->vendor_name = $req->input('vendor_name');
        $vendor->address = $req->input('address');
        $vendor->phone = $req->input('phone');
        $vendor->tax_code = $req->input('tax_code');
        $vendor->save();
        return redirect()->route('list_vendor')->with('thongbao','Thêm nhà cung cấp thành công');
    }
    public function delete_vendor($id)
    {
    	$vendor = Vendors::find($id);
    	$vendor->delete();
    	return redirect()->back()->with('thongbao','Xóa nhà cung cấp thành công');
    }
    public function edit_vendor($id)
    {
    	$vendor = Vendors::find($id);
    	return view('admin.vendor.edit_vendor',compact('vendor'));
    }
    public function update_vendor(editVendorRequest $req,$id)
    {
    	$vendor = Vendors::find($id);
        $vendor->vendor_name = $req->input('vendor_name');
        $vendor->address = $req->input('address');
        $vendor->phone = $req->input('phone');
        $vendor->tax_code = $req->input('tax_code');
        $vendor->save();
        return redirect()->route('list_vendor')->with('thongbao','Cập nhật nhà cung cấp thành công');
    }
}
