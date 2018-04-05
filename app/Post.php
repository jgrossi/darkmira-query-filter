<?php

namespace App;

use App\Http\Filters\Filterable;
use Corcel\Model\Post as CorcelPost;

class Post extends CorcelPost
{
    use Filterable;

    /**
     * @var string
     */
    protected $postType = 'post';
}
