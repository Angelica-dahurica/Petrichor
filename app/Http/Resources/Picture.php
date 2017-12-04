<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Picture extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'pictureid' => $this->pictureid,
            'picture_album' => $this->picture_album,
            'picture_name' => $this->picture_name,
            'picture_description' => $this->picture_description,
            'picture_content' => $this->picture_content,
            'picture_publishtime' => $this->picture_publishtime,
            'picture_tags' => $this->picture_tags,
        ];
    }
}
