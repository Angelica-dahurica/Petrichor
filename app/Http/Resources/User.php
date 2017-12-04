<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class User extends Resource
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
            'userid' => $this->userid,
            'nickname' => $this->nickname,
            'sex' => $this->sex,
            'interest' => $this->interest,
            'password' => $this->password,
            'avatar' => $this->avatar,
            'age' => $this->age,
            'signature' => $this->signature,
        ];
    }
}
