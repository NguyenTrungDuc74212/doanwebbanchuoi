<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Goutte\Client;
use App\Models\Post;
use Str;

class addWebsitePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'website:add-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fake dữ liệu bài viết';

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
        $crawler = $client->request('GET','https://unifarm.com.vn/tin-tuc/nganh-nong-nghiep/');
        $crawler->filter('.media')->each(function($node)
        {
            $url = $node->attr('href');
            $desc = $node->filter('p')->first()->text();
            $this->CrawlDetail($url,$desc);

        });
        
    }
    public function CrawlDetail($url,$desc)
    {
        try {
            $client = new Client();
            $crawler = $client->request('GET',$url);
            $title = $crawler->filter('.box-title')->first()->text();
            $content = $crawler->filter('.page-content .page-content')->first()->text();
            // $slug = Str::slug($title);
            $post = new Post;
            $post->title = $title;
            $post->desc = $desc;
            $post->content = $content;
            $post->meta_title = $title;
            $post->category_id = 2;
            $post->image = "2.jpg";
            $post->meta_keywords = $title;
            $post->slug = Str::slug($title);
            $post->save();
            $this->info('crawl tin thành công: '.$title);
            
            
        } 
        catch (Exception $e) {

        }
    }
}
