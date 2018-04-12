<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post as PostResource;
use App\Post;

class PostController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $posts = Post::newest()->limit(10)->get();

        return PostResource::collection($posts);
    }
}
