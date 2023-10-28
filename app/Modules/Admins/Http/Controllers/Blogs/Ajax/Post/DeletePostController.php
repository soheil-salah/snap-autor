<?php

namespace App\Modules\Admins\Http\Controllers\Blogs\Ajax\Post;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use Illuminate\Http\Request;

class DeletePostController extends Controller
{
    public function __invoke(Request $request)
    {
        Post::where('id', $request->post_id)->delete();
    }
}
