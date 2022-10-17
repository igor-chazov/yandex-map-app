<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GeoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'type' => 'Feature',
            'id' => $this->id,
            'user_id' => $this->user_id,
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [$this->Latitude, $this->longitude],
            ],
            'properties' => [
                'balloonContent' => $this->name,
            ],
        ];
    }
}
