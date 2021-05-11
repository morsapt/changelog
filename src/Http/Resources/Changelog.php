<?php

namespace Morsapt\Changelog\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Changelog extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
