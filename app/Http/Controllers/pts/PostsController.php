<?php

namespace lara\Http\Controllers\pts;

use Illuminate\Http\Request;
use lara\pts\Post;
use lara\Http\Requests;
use lara\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('posts.index',  compact('posts'));
    }
}
