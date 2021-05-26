<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use App\Models\Product;
use Str;


class addWebsiteProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'website:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fake dữ liệu bảng tin từ unifarm';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = new Client();
        $crawler = $client->request('GET','https://unifarm.com.vn/cua-hang/');
        $crawler->filter('.product')->each(function($node)
        {
            $url = $node->filter('a')->attr('href');
            $title = $node->filter('.product-info h3')->first()->text();
            $price = $node->filter('.product-info .amount')->first()->text();
            $this->CrawlDetail($url,$title,$price);
            
        });
    }
    public function CrawlDetail($url,$title,$price)
    {
        try {
            $client = new Client();
            $crawler = $client->request('GET',$url);
            $desc = $crawler->filter('.editor-content p')->first()->text();
            $product = new Product;
            $product->name = $title;
            $product->price = $price;
            $product->desc = $desc;
            $product->content = $desc;
            $product->quantity = 10;
            $product->meta_title = $title;
            $product->category_product_id = 2;
            $product->image = "2.jpg";
            $product->meta_keywords = $title;
            $product->slug = Str::slug($title);
            $product->save();
            $this->info('crawl tin thành công: '.$title);
        } 
        catch (Exception $e) {

        }
    }

}
