<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id'=>$this->id,
            'author'=> new UserResource($this->user),
            'title'=>$this->title,
            'body'=>$this->body,
            'comments' => CommentResource::collection($this->comments),
            'created_at' => $this->created_at

        ];
    }
}
