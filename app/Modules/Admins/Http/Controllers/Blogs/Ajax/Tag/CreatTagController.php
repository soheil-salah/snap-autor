<?php

namespace App\Modules\Admins\Http\Controllers\Blogs\Ajax\Tag;

use App\Http\Controllers\Controller;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CreatTagController extends Controller
{
    public function __invoke(Request $request)
    {
        $tags = $request->tags;

        foreach($tags as $tag){

            Tag::firstOrCreate(['slug' => Str::slug($tag)],[
                'name' => $tag,
                'slug' => Str::slug($tag),
            ]);
        }
    }
}
