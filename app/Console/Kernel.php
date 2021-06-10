<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\WarehouseProduct;
use App\Models\Product;
use App\Models\User;
use App\Models\BackupFile;
use Carbon\Carbon;
use DB;
use Pusher\Pusher;
use App\Notifications\NotificationAdmin;
use Illuminate\Support\Facades\Schema;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('website:add-post')->everyMinute();
        $schedule->call(function () {
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
            $fileBackup=new BackupFile();
            $fileBackup->file_name=$file_name;
            $fileBackup->day=Carbon::now()->format('d-m-Y');
           $fileBackup->save();
        })->everyMinute();


        $schedule->call(function () {
            $expiration_coming = Carbon::now()->addDays(10)->format("Y-m-d");
            $product_warehouse=WarehouseProduct::where('expiration_date',$expiration_coming)->where("status",0)->get();
            $message="Sản phẩm hết hạn sau 10 ngày:";
            if($product_warehouse==null)
            {
                $message="";
            }
            foreach($product_warehouse as $item)
            {
                $message=$message." ".$item->product->name.",";
            }
            $options = array(
                'cluster' => 'ap1',
                'encrypted' => true
            );

            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );
            $users = User::join('users_roles', 'users.id', '=', 'users_roles.user_id')->where("users_roles.role_id",1)->get(['users.*']);
            $pusher2 = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );
            if(!empty($message))
            {
            
                $data['message']=$message;
                $pusher->trigger('my-channel', 'product_expiration', $data);
               
                foreach($users as $user)
                {
                    $user->notify(new NotificationAdmin($message));
                }
            }
         
            $message="Sản phẩm đã hết hạn: ";
             $now_day = Carbon::now()->format("Y-m-d");
             $product_warehouse_expiration=WarehouseProduct::where('expiration_date',$now_day)->where("status",0)->get();
             foreach($product_warehouse_expiration as $item)
             {
                $message=$message." ".$item->product->name.",";
                $item->status=1;
                $item->save();
             }
             if($product_warehouse_expiration==null)
             {
                 $message="";
             }
             if(!empty($message))
            {
                $data['message']=$message;
                $pusher2->trigger('my-channel', 'product_expired', $data);
                foreach($users as $user)
                {
                    $user->notify(new NotificationAdmin($message));
                }
              
            }
         })->daily();
        
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
