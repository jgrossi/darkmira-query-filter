<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    protected const EXCERPT_SIZE = 400;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->ID,
            'title' => $this->post_title,
            'slug' => $this->post_name,
            'status' => $this->post_status,
            'type' => $this->post_type,
            'content' => $this->excerpt($this->post_content) . '...',
            'published_at' => $this->post_date,
            'updated_at' => $this->post_modified,
        ];
    }

    /**
     * @param string $content
     * @return string
     */
    private function excerpt(string $content): string
    {
        return mb_substr($content, 0, strrpos(
            mb_substr($content, 0, static::EXCERPT_SIZE), ' '
        ));
    }
}
