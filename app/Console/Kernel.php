<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\WarehouseProduct;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Pusher\Pusher;
use App\Notifications\NotificationAdmin;

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
            $expiration_coming = Carbon::now()->addDays(10)->format("Y-m-d");
            $product_warehouse=WarehouseProduct::where('expiration_date',$expiration_coming)->where("status",0)->get();
            $message="";
            foreach($product_warehouse as $item)
            {
                $message=$message." ".$item->product->name.",";
            }
            if(!empty($message))
            {
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
                $data['message']=$message;
                $pusher->trigger('my-channel', 'product_expiration', $data);
                $users = User::join('users_roles', 'users.id', '=', 'users_roles.user_id')->where("users_roles.role_id",1)->get(['users.*']);
                foreach($users as $user)
                {
                    $user->notify(new NotificationAdmin($message));
                }
            }

        //     $now_day = Carbon::now()->format("Y-m-d");
        //     $product_warehouse_expiration=WarehouseProduct::where('expiration_date',$now_day)->where("status",0)->get();
         })->everyMinute();
        
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
