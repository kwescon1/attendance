<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $token = $this->createToken("auth token")->accessToken;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'index' => $this->student->index,
            'access_token' => $token
        ];
    }
}
