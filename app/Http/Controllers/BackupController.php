<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\BackupFile;
use Illuminate\Support\Facades\Schema;

class BackupController extends Controller
{
    //
    public function getListBackup()
    {
        $backupFile=BackupFile::all();
        return view("admin.backup.backup",compact('backupFile'));
    }
public function restoreDatabase($id)
{
    $tables = array("users","users_roles","tbl_warehouse_product","tbl_warehouse_order","tbl_warehouse","tbl_visitors","tbl_vendors","tbl_tinhthanhpho","tbl_soical","tbl_slider","tbl_shipping","tbl_return_voucher_detail","tbl_return_voucher","tbl_repost","tbl_product","tbl_price_product","tcl_post","tbl_order_detail","tbl_order","tbl_inward_slip_details","tbl_inward_slip","tbl_gallery","tbl_feeship","tbl_customer_product","tbl_customer","tbl_coupon","tbl_category_product","tbl_category_post","roles","password_resets","notifications","migrations");
    foreach($tables as $name)
    {
        Schema::dropIfExists($name);
    }
    $backFile=BackupFile::find($id);
    $file="backup/".$backFile->file_name;
    DB::unprepared(file_get_contents($file));
    return redirect()->back()->with('success','Khôi phục thành công');
}

public function myBackup()
{
     //ENTER THE RELEVANT INFO BELOW
     $mysqlHostName      = env('DB_HOST');
     $mysqlUserName      = env('DB_USERNAME');
     $mysqlPassword      = env('DB_PASSWORD');
     $DbName             = env('DB_DATABASE');
     $backup_name        = "mybackup.sql";
     $tables             = array("users","users_roles","tbl_warehouse_product","tbl_warehouse_order","tbl_warehouse","tbl_visitors","tbl_vendors","tbl_tinhthanhpho","tbl_soical","tbl_slider","tbl_shipping","tbl_return_voucher_detail","tbl_return_voucher","tbl_repost","tbl_product","tbl_price_product","tcl_post","tbl_order_detail","tbl_order","tbl_inward_slip_details","tbl_inward_slip","tbl_gallery","tbl_feeship","tbl_customer_product","tbl_customer","tbl_coupon","tbl_category_product","tbl_category_post","roles","password_resets","notifications","migrations"); //here your tables...

     $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword",array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
     $get_all_table_query = "SHOW TABLES";
     $statement = $connect->prepare($get_all_table_query);
     $statement->execute();
     $result = $statement->fetchAll();
     $output = '';
     foreach($tables as $table)
     {
      $show_table_query = "SHOW CREATE TABLE " . $table . "";
      $statement = $connect->prepare($show_table_query);
      $statement->execute();
      $show_table_result = $statement->fetchAll();

      foreach($show_table_result as $show_table_row)
      {
       $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
      }
      $select_query = "SELECT * FROM " . $table . "";
      $statement = $connect->prepare($select_query);
      $statement->execute();
      $total_row = $statement->rowCount();

      for($count=0; $count<$total_row; $count++)
      {
       $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
       $table_column_array = array_keys($single_result);
       $table_value_array = array_values($single_result);
       $output .= "\nINSERT INTO $table (";
       //$output .= "" . implode(", ", $table_column_array) . ") VALUES (";
        $output .= "";
      foreach($table_column_array as $key=>$value)
       {
           if($key==0)
           {
            $output .='`'.$value.'`';
            continue;
           }
        $output .=',`'.$value.'`';
       }
       $output .= ") VALUES (";
      
       $output .= "'" . implode("','", $table_value_array) . "');\n";
       $output=str_replace("''","NULL",$output);
      }
    }
     $file_name = date('y-m-d') . '.sql';
     $file_handle = fopen('backup/'.$file_name, 'w+');
     fwrite($file_handle, $output);
     fclose($file_handle);
    //  header('Content-Description: File Transfer');
    //  header('Content-Type: application/octet-stream');
    //  header('Content-Disposition: attachment; filename=' . basename($file_name));
    //  header('Content-Transfer-Encoding: binary');
    //  header('Expires: 0');
    //  header('Cache-Control: must-revalidate');
    //     header('Pragma: public');
    //     header('Content-Length: ' . filesize($file_name));
    //     ob_clean();
    //     flush();
    //     readfile($file_name);
    //     unlink($file_name);

   
}
public function search(Request $req)
{
    $backupFile=BackupFile::where('day',$req->date)->get();
    return view("admin.backup.backup",compact('backupFile'));
}
}
