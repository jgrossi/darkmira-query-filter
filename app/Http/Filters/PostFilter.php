<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends QueryFilter
{
    /**
     * @param string $status
     */
    public function status(string $status)
    {
        $this->builder->where('post_status', strtolower($status));
    }

    /**
     * @param string $title
     */
    public function title(string $title)
    {
        $words = explode(' ', $title);

        $this->builder->where(function (Builder $query) use ($words) {
            foreach ($words as $word) {
                $query->where('post_title', 'like', "%$word%");
            }
        });
    }

    /**
     * @param string $username
     */
    public function author(string $username)
    {
        $this->builder->whereHas('author', function (Builder $query) use ($username) {
            $query->where('user_nicename', $username);
        });
    }
}
