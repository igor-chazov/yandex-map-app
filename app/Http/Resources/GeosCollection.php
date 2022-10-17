<?php

namespace App\Http\Resources;

use App\Models\Geo;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GeosCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'type' => 'FeatureCollection',
            'features' => GeoResource::collection(Geo::all()),

        ];
    }
}
