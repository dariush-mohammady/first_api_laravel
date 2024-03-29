<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\Resource;

class Course extends Resource
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
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'image' => $this->image,
            'time' => jdate($this->created_at)->format('datetime'),
            'episodes' => new EpisodeCollection($this->episodes)
        ];
    }
}
