<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\Product;
use App\Models\WarehouseProduct;
use App\Http\Requests\addWarehouseRequest;
use App\Http\Requests\editWarehouseRequest;

class WarehouseController extends Controller
{
	public function list_warehouse()
	{
	  $warehouse = Warehouse::all();
      return view('admin.warehouse.list_warehouse',compact('warehouse'));
	}
	public function insert_warehouse(){
		return view('admin.warehouse.add_warehouse');
	}
	public function save_warehouse(addWarehouseRequest $req)
	{

      	$warehouse = new Warehouse;
		$warehouse->warehouse_name = $req->input('warehouse_name');
		$warehouse->quantity_contain = $req->input('quantity_contain');
		$warehouse->quantity_now = 0;
		$warehouse->save();
		return redirect()->route('list_warehouse')->with('thongbao','Thêm kho thành công!!!');

	}
	public function delete_warehouse($id){
      $warehouse = Warehouse::find($id);
      if ($warehouse->quantity_now>0) {
      	return redirect()->route('list_warehouse')->with('error','Kho vẫn đang còn sản phẩm không được xóa!!!');
      }
      $warehouse->delete();
      return redirect()->route('list_warehouse')->with('thanhcong','Xóa kho thành công!!!');

	}
	public function edit_warehouse($id)
	{
		 $warehouse = Warehouse::find($id);
		 return view('admin.warehouse.edit_warehouse',compact('warehouse'));

	}
	public function update_warehouse($id, editWarehouseRequest $req)
	{
        $warehouse = Warehouse::find($id);
		$warehouse->warehouse_name = $req->input('warehouse_name');
		$warehouse->quantity_contain = $req->input('quantity_contain');
		$warehouse->quantity_now = 0;
		$warehouse->save();
		return redirect()->route('list_warehouse')->with('thongbao','Update kho thành công!!!');
	}
}
