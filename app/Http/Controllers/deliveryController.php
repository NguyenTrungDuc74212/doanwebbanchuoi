<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tinhthanhpho;
use App\Models\Quanhuyen;
use App\Models\Xaphuongthitran;
use App\Models\Feeship;

class deliveryController extends Controller
{
	public function delete_delivery(Request $req)
	{

		$feeship = Feeship::find($req->id);
		$feeship->delete();
		echo $req->page ;
	}
	public function delivery()
	{	
		$city = Tinhthanhpho::orderby('matp','DESC')->get();
		$feeship = Feeship::orderby('id','DESC')->paginate(5);
		return view('admin.delivery.add_delivery',compact('city','feeship'));

	}
	public function update_delivery(Request $req)
	{
		$old=$req->feeship;
		$phiship = Feeship::find($req->id);
		$phiship->feeship = $req->feeship;
		$phiship->save();
		echo $req->page;		  

	}
	public function load_delivery(Request $req)
	{
		if($req->ajax())
		{
			if ($req->id!=null) {
				$count = Feeship::orderBy('id','DESC')->where('matp_id',$req->id)->get();
				$feeship = Feeship::orderBy('id','DESC')->where('matp_id',$req->id)->paginate(count($count));
				$city = Tinhthanhpho::orderby('matp','DESC')->get();
			}
			else{
			$feeship = Feeship::orderby('id','DESC')->paginate(5);
			$city = Tinhthanhpho::orderby('matp','DESC')->get();
		     }
			return view('admin.delivery.get_feeship_more',compact('feeship','city'));
		}
	}
	public function insert_delivery(Request $req)
	{
		$feeship = new Feeship;
		$feeship->matp_id = $req->name_tp;
		$feeship->maqh_id = $req->name_qh;
		$feeship->xa_id = $req->name_xp;
		$feeship->feeship = $req->feeship;
		$feeship->save();

	}
	public function select_delivery(Request $req)
	{
		$city = Tinhthanhpho::where('matp',$req->name_tp)->first();
		$quanhuyen = Quanhuyen::where('maqh',$req->name_qh)->first();
		$result ='';
		if ($req->choose=="thanhpho") {
			$quanhuyen = $city->Tbl_quanhuyen;
			foreach ($quanhuyen as $value) {
				$result.= '<option value='.$value->maqh.'>'.$value->name.'</option>';

			}
			echo $result;

		}
		elseif($req->choose=="quanhuyen")
		{
			$xaphuongthitran = $quanhuyen->Tbl_xaphuongthitran;
			foreach ($xaphuongthitran as $value) {
				$result .= '<option value='.$value->xaid.'>'.$value->name.'</option>';
			}
			echo $result;
		}
	}

}
