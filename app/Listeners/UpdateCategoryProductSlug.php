<?php

namespace App\Listeners;

use App\Events\CategoryProductCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Str;

class UpdateCategoryProductSlug
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CategoryProductCreated  $event
     * @return void
     */
    public function handle(CategoryProductCreated $event)
    {
        $post = $event->post;
        if ($post->name) {
          $slug = Str::slug($post->name);  
        }
        else
        {
            $slug = Str::slug($post->title);
        }
        
        $post->slug = $slug;
        $post->save();
    }
}
