<?php

namespace App;

use Corcel\Model\Post as CorcelPost;

class Post extends CorcelPost
{
    /**
     * @var string
     */
    protected $postType = 'post';
}
