<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Resources\Post as PostResource;
use App\Post;

class PostController extends Controller
{
    /**
     * @param PostFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(PostFilter $filter)
    {
        $posts = Post::filter($filter)
            ->newest()
            ->paginate(10);

        return PostResource::collection($posts);
    }
}
