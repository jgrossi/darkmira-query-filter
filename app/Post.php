<?php

namespace App;

use Corcel\Model\Post as BasePost;

class Post extends BasePost
{
    /**
     * @var string
     */
    protected $connection = 'corcel';

    /**
     * @var string
     */
    protected $postType = 'post';
}
