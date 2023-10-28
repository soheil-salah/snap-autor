<?php

namespace App\Modules\Admins\Http\Controllers\Blogs;

use App\DataTables\Blog\PostDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use App\Models\Blog\PostCategory;
use App\Models\Blog\PostTag;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(PostDataTable $dataTable)
    {
        $countPosts = Post::count();
        
        return $dataTable->render('admin.pages.blog.post.index', compact('countPosts'));
    }

    public function create()
    {   
        $postCategories = PostCategory::get();
        $tags = Tag::get();

        return view('admin.pages.blog.post.create', compact('postCategories', 'tags'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $postCategories = PostCategory::get();
        
        $post == null ? abort(404) : null;

        $selectedTags = [];

        foreach($post->tags as $tag){
            $selectedTags[] = $tag->tag_id;
        }

        $tags = Tag::whereNotIn('id', $selectedTags)->get();

        return view('admin.pages.blog.post.show', compact('post', 'postCategories', 'tags'));
    }
}
