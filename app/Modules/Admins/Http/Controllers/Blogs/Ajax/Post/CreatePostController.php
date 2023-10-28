<?php

namespace App\Modules\Admins\Http\Controllers\Blogs\Ajax\Post;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use App\Models\Blog\PostAuthor;
use App\Models\Blog\PostTag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    public function __invoke(Request $request)
    {
        $category = $request->category;
        $title = $request->title;
        $short_description = $request->short_description;
        $content = $request->content;
        $posted_at = $request->posted_at == null ? Carbon::now() : $request->posted_at;
        $tags = $request->tags;
        $thumbnail = null;
        $slug = md5(uniqid());

        $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:posts,title'],
            'short_description' => ['string', 'max:255'],
        ]);

        // upload thumbnail if exists
        if($request->hasFile('thumbnail')){

            $thumbnail_name = md5(uniqid());
            $thumbnail_path = uploads_path('blog/posts/'.$slug.'/thumbnail');

            $request->validate([
                'thumbnail' => ['required', 'mimes:png,jpg']
            ]);

            $thumbnail = $thumbnail_name.'.'.$request->file('thumbnail')->getClientOriginalExtension();

            $request->file('thumbnail')->move($thumbnail_path, $thumbnail);
        }

        $post = Post::create([
            'post_category_id' => $category,
            'title' => $title,
            'short_description' => $short_description,
            'content' => $content,
            'thumbnail' => $thumbnail,
            'slug' => $slug,
            'posted_at' => $posted_at,
        ]);

        PostAuthor::create([
            'post_id' => $post->id,
            'byAdmin' => 1,
        ]);

        foreach($tags as $tag){

            PostTag::create([
                'post_id' => $post->id,
                'tag_id' => $tag
            ]);
        }
    }
}
