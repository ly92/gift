<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;

class BlogController extends Controller
{
    public function index(){
        $post = Post::where('published_at', '<=', Carbon::now())->orderBy('published_at', 'desc')->paginate(config('blog.posts_per_page'));
        return view('blog.index', compact('posts'));
    }

    public function showPost($slug){
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('blog.post', ['post' => $post]);
    }
}
