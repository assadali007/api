<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PetitionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       //When a resource is created, it comes with a toArray method.
        // This method has access to the whole request object which means we can customize and transform
        // what will be returned by modifying the return statement. If we leave it as it is, 
        //all model attributes will be returned.
       // return parent::toArray($request);

       return [
        'id' => $this->id,
        'title' => ucwords($this->title),
       'category' => $this->category,
       'description' => $this->description,
       'author' => $this->author,
       'signees'=>$this->signees,
 ];
    }
}
