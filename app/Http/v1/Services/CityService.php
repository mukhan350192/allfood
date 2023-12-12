<?php

namespace App\Http\v1\Services;

use App\Models\City;

class CityService
{
    public function add(string $name,bool $status,string $latitude,string $longitude,string $polygon,string $square){
        City::create([
           'name' => $name,
           'status' => $status,
           'latitude' => $latitude,
           'longitude' => $longitude,
           'polygon' => $polygon,
           'square_polygon' => $square,
        ]);
        return response()->success();
    }
}
