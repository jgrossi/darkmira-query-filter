<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
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
            'content' => $this->post_content,
            'published_at' => $this->post_date,
            'updated_at' => $this->post_modified,
        ];
    }
}
