<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputSheet;
use App\Models\inputSheetDetail;
use App\Models\Product;
use App\Models\Vendors;
use App\Models\Warehouse;
use App\Models\WarehouseProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\addInputRequest;
use App\Http\Requests\editInputRequest;
use Auth;

class inputSheetController extends Controller
{
  public function insert_input(Request $req)
  {
   $product = Product::all();
   $warehouse = Warehouse::all();
   $vendor = Vendors::all();
   return view('admin.input_sheet.add_input',compact('product','warehouse','vendor'));
 }
 public function load_input_sheet(Request $req)
 {

   if ($req->id) {
    $product = DB::table('tbl_product')->where('vendor_id',$req->vendor_id)->whereNotIn('id',$req->id)->get();
  }
  else {
   $product = Product::where('vendor_id',$req->vendor_id)->get();
 }

 $data = [];
 foreach ($product as $value) {
   $data[$value->id] = $value->name;
 }
 return response()->json($data);

}

public function save_input(addInputRequest $req){
 $product_id = $req->product_id; 
 $quantity = $req->quantity;
 $expiration_date=$rep->expiration_date;
 $total_quantity = 0;
 $price_import = $req->price_import;
 $total_amount = 0;
 $user_id = Auth::id();
 $vendor_id = $req->input('vendor_id');
 $warehouse_id = $req->input('warehouse_id');
 $tongtien = 0;

 foreach ($quantity as $soluong) {
   $total_quantity += $soluong;
 }
 foreach ($price_import as $value) {
   $total_amount += $value;
 }
 foreach ($quantity as $key1 => $value) {
  foreach ($price_import as $key2 => $value2) {
   if ($key1==$key2) {
    $tongtien +=$value*$value2;
  }
}
}

if ($req->status==1) {
  $warehouse = Warehouse::find($warehouse_id);
  if (($warehouse->quantity_now + $total_quantity)>$warehouse->quantity_contain) {
    return redirect()->back()->with('error','Sức chứa trong kho không đủ!!!');
  }
  else {
    $warehouse->quantity_now =  $warehouse->quantity_now + $total_quantity;
    $warehouse->save();
    // foreach ($product_id as $key1 => $product) {
    //   foreach ($quantity as $key2 => $soluong) {
    //     if ($key1==$key2) {
    //       $warehouse_product = new WarehouseProduct;
    //       $warehouse_product->product_id = $product;
    //       $warehouse_product->quantity = $soluong;
    //       $warehouse_product->warehouse_id = $warehouse_id;
    //       $warehouse_product->expiration_date=
    //       $warehouse_product->save();
    //     }
    //   }
    // }
        for ($i=0;$i<count($product_id);$i++) {
          $warehouse_product = new WarehouseProduct;
          $warehouse_product->product_id = $product_id[$i];
          $warehouse_product->quantity = $quantity[$i];
          $warehouse_product->warehouse_id = $warehouse_id;
          $warehouse_product->expiration_date=$expiration_date[$i];
          $warehouse_product->save();
    }
  }
  foreach ($product_id as $value) {
    if ($value=="undefined") {
     return redirect()->back()->with('error','Bạn phải không được bỏ trống phần nhập sản phẩm!!!');
   }
 }
 for ($i = 0; $i <count($product_id) ; $i++) {
  if ($product_id[$i]=="undefined") {
   return redirect()->back()->with('error','Bạn phải không được bỏ trống phần nhập sản phẩm!!!');
 }
 $product = Product::where('id',$product_id[$i])->first();
 $product->quantity =$product->quantity + $quantity[$i];
 $product->save(); 
}

}

$inputSheet = new InputSheet;
$inputSheet->user_id = $user_id;
$inputSheet->date_input = $req->date_input;
$inputSheet->vendor_id = $vendor_id;
$inputSheet->total_amount = $tongtien;
$inputSheet->warehouse_id = $warehouse_id;
$inputSheet->total_quanlity = $total_quantity;
$inputSheet->status = $req->status;
$inputSheet->save();
$inputSheet_id = $inputSheet->id;

foreach ($product_id as $key1 => $product) {
 foreach ($quantity as $key2 => $soluong) {
  if ($key1==$key2) {
    foreach ($price_import as $key3=> $gianhap) {
      if ($key2==$key3) {
        foreach ($req->unit as $key4=> $unit) {
          if ($key3==$key4) {
            $inputSheet_detail = new inputSheetDetail;
            $inputSheet_detail->product_id = $product;
            $inputSheet_detail->inward_slip_id = $inputSheet_id;
            $inputSheet_detail->quantity = $soluong;
            $inputSheet_detail->price_import = $gianhap;
            $inputSheet_detail->unit = $unit;
            $inputSheet_detail->save();
          }
        }
      }
    } 
  }
}
}
return redirect()->route('list_input')->with('thongbao','Lập phiếu nhập thành công!!!');
}
public function list_input(Request $req)
{
  $input = InputSheet::all();
  return view('admin.input_sheet.list_input',compact('input'));
}
public function delete_input($id)
{
  $input = InputSheet::find($id);
  $input->delete();

  $inputSheet_detail = inputSheetDetail::where('inward_slip_id',$id)->get();
  $soluong = 0;
  $id = [];
  foreach ($inputSheet_detail as $value) {
    array_push($id, $value->id);
    $soluong+=$value->quantity;
  }
  inputSheetDetail::destroy($id);

  return redirect()->route('list_input')->with('thongbao','Xóa phiếu nhập thành công!!!'); 

}
public function edit_input($id)
{
 $input = InputSheet::find($id);
 $warehouse = Warehouse::all();
 $vendor = Vendors::all();
 $product = Product::where('vendor_id',$input->vendor_id)->get();
 $input_detail = inputSheetDetail::where('inward_slip_id',$id)->get();
 return view('admin.input_sheet.edit_input',compact('input','warehouse','vendor','input_detail','product'));

}
public function load_input_sheet_edit(Request $req)
{
  if ($req->id) {
    $product = DB::table('tbl_product')->where('vendor_id',$req->vendor_id)->whereNotIn('id',$req->id)->get();
  }
  else {
   $product = Product::where('vendor_id',$req->vendor_id)->get();
 }

 $data = [];
 foreach ($product as $value) {
   $data[$value->id] = $value->name;
 }
 return response()->json($data);
}
public function update_input($id,editInputRequest $req)
{
  $product_id = $req->product_id;
  $quantity = $req->quantity;
  $total_quantity = 0;
  $price_import = $req->price_import;
  $total_amount = 0;
  $user_id = Auth::id();
  $vendor_id = $req->input('vendor_id');
  $warehouse_id = $req->input('warehouse_id');
  $tongtien = 0;
  $total_quantity_edit = 0;
  $total_amount_edit = 0;
  $tongtien_edit = 0;

  if ($req->product_edit_id) {
    $product_edit_id = $req->product_edit_id;
    $quantity_edit = $req->quantity_edit;
    $price_import_edit = $req->price_import_edit;
    $user_id = Auth::id();
    $vendor_id = $req->input('vendor_id');
    $warehouse_id = $req->input('warehouse_id');


    foreach ($quantity_edit as $soluong) {
      $total_quantity_edit += $soluong;
    }
    foreach ($price_import_edit as $value) {
      $total_amount_edit += $value;
    }
    foreach ($quantity_edit as $key1 => $value) {
      foreach ($price_import_edit as $key2 => $value2) {
       if ($key1==$key2) {
        $tongtien_edit +=$value*$value2;
      }
    }
  }
  foreach ($product_edit_id as $key1 => $product) {
   foreach ($quantity_edit as $key2 => $soluong) {
    if ($key1==$key2) {
      foreach ($price_import_edit as $key3=> $gianhap) {
        if ($key2==$key3) {
          foreach ($req->unit_edit as $key4=> $unit) {
           if ($key3==$key4) {
            $inputSheet_detail = new inputSheetDetail;
            $inputSheet_detail->product_id = $product;
            $inputSheet_detail->inward_slip_id = $id;
            $inputSheet_detail->quantity = $soluong;
            $inputSheet_detail->unit = $unit;
            $inputSheet_detail->price_import = $gianhap;
            $inputSheet_detail->save();
          }
          
        }
      }
    } 
  }
}
}
}


foreach ($quantity as $soluong) {
 $total_quantity += $soluong;
}
foreach ($price_import as $value) {
 $total_amount += $value;
}
foreach ($quantity as $key1 => $value) {
  foreach ($price_import as $key2 => $value2) {
   if ($key1==$key2) {
    $tongtien +=$value*$value2;
  }
}
}


$inputSheet = InputSheet::find($id);
$inputSheet->user_id = $user_id;
$inputSheet->vendor_id = $vendor_id;
$inputSheet->date_input = $req->date_input;
$inputSheet->total_amount = $tongtien+$tongtien_edit;
$inputSheet->warehouse_id = $warehouse_id;
$inputSheet->total_quanlity = $total_quantity+$total_quantity_edit;
$inputSheet->save();

$inputSheet_detail = $inputSheet->input_detail;
foreach ($product_id as $key1 => $product) {
 foreach ($quantity as $key2 => $soluong) {
  if ($key1==$key2) {
    foreach ($price_import as $key3=> $gianhap) {
      if ($key2==$key3) {
        foreach ($req->unit as $key4=> $unit) {
          if ($key3==$key4) {
            foreach ($inputSheet_detail as $key5=> $value) {     
              if ($key4==$key5) {
                $value->product_id = $product;
                $value->inward_slip_id = $id;
                $value->quantity = $soluong;
                $value->unit = $unit;
                $value->price_import = $gianhap;
                $value->save();
              }
            }
          }
        }
      }
    } 
  }
}
}

return redirect()->route('list_input')->with('thongbao','Update phiếu nhập thành công!!!');
}
public function change_status(Request $req)
{
 $input_sheet_id = $req->input_id;
 $status = $req->status;
 $inputSheet = InputSheet::find($input_sheet_id);
 $total_quantity = $inputSheet->total_quanlity;
 $warehouse_id = $inputSheet->warehouse_id;
 $input_detail = $inputSheet->input_detail;
 $product_id = [];
 $quantity = [];

 for ($i = 0; $i <count($input_detail) ; $i++) {
   array_push($product_id, $input_detail[$i]->product_id);
   array_push($quantity, $input_detail[$i]->quantity);
 }

 if ($status==1) {

  $inputSheet->status = $status;
  $inputSheet->save();

  $warehouse = Warehouse::find($warehouse_id);
  if (($warehouse->quantity_now + $total_quantity)>$warehouse->quantity_contain) {
    return redirect()->back()->with('error','Sức chứa trong kho không đủ!!!');
  }
  else {
    $warehouse->quantity_now =  $warehouse->quantity_now + $total_quantity;
    $warehouse->save();
    foreach ($product_id as $key1 => $product) {
      foreach ($quantity as $key2 => $soluong) {
        if ($key1==$key2) {
          $warehouse_product = new WarehouseProduct;
          $warehouse_product->product_id = $product;
          $warehouse_product->quantity = $soluong;
          $warehouse_product->warehouse_id = $warehouse_id;
          $warehouse_product->save();
        }
      }
    }
  }
  foreach ($product_id as $value) {
    if ($value=="undefined") {
     return redirect()->back()->with('error','Bạn phải không được bỏ trống phần nhập sản phẩm!!!');
   }
 }
 for ($i = 0; $i <count($product_id) ; $i++) {
  if ($product_id[$i]=="undefined") {
   return redirect()->back()->with('error','Bạn phải không được bỏ trống phần nhập sản phẩm!!!');
 }
 $product = Product::where('id',$product_id[$i])->first();
 $product->quantity =$product->quantity + $quantity[$i];
 $product->save(); 
}
}



}
public function view_input($id)
{
 $input = InputSheet::find($id);
 $warehouse = Warehouse::all();
 $vendor = Vendors::all();
 $product = Product::where('vendor_id',$input->vendor_id)->get();
 $input_detail = inputSheetDetail::where('inward_slip_id',$id)->get();
 return view('admin.input_sheet.view_input',compact('input','warehouse','vendor','input_detail','product'));
}
}
