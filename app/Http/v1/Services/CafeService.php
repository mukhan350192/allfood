<?php

namespace App\Http\v1\Services;

use App\Models\Cafe;
use App\Models\City;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CafeService
{
    public function getServices(): JsonResponse
    {
        $data = Section::query()->select('id', 'name')->get()->toArray();
        return response()->success(['data' => $data]);
    }

    public function addCafe(
        int    $city_id,
        int    $status,
        string $name,
               $image,
        string $latitude,
        string $longitude,
        int    $min_order,
        int    $delivery_price,
        string $time_delivery,
        array    $section_id
    ): JsonResponse
    {
        $extension = $image->getClientOriginalExtension();
        $imageName = sha1(Str::random(50) . time()) . "." . $extension;
        $cafe = Cafe::create([
            'city_id' => $city_id,
            'status' => $status,
            'name' => $name,
            'image' => $imageName,
            'rating' => 5.0,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'min_order' => $min_order,
            'delivery_price' => $delivery_price,
            'time_delivery' => $time_delivery,
        ]);
        if (!$cafe){
            return response()->fail('Попробуйте позже');
        }
        foreach ($section_id as $id){
            DB::table('cafe_sections')->insert([
               'cafe_id' => $cafe->id,
               'section_id' => $id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        $this->upload($image, $imageName);
        return response()->success();
    }

    public function upload($image,string $imageName){
        return $image->storeAs('public/images/cafe/logo/',$imageName);
    }

    public function getCity(){
        if (Cache::get('city')){
            return Cache::get('city');
        }
        $data = City::all();
        Cache::put('city', $data, 60*60*24);
        return $data;
    }
}
