<?php

namespace App\Http\v1\Controllers;

use App\Http\Requests\AddCafeRequest;
use App\Http\Requests\AddCityRequest;
use App\Http\Requests\AddSectionRequest;
use App\Http\v1\Services\CafeService;
use App\Http\v1\Services\CityService;
use App\Models\Section;
use Illuminate\Http\JsonResponse;

class AdminController
{
    /**
     * @param AddCityRequest $request
     * @param CityService $service
     * @return JsonResponse
     */

    public function addCity(AddCityRequest $request, CityService $service): JsonResponse
    {
        return $service->add($request->name, $request->status, $request->latitude, $request->longitude, $request->polygon, $request->square_polygon);
    }

    public function addCafe(AddCafeRequest $request, CafeService $service): JsonResponse
    {
        return $service->addCafe($request->city_id,$request->status,$request->name,$request->file('image'),$request->latitude,$request->longitude,$request->min_order,$request->delivery_price,$request->time_delivery,$request->sections);
    }

    public function getSections(CafeService $service): JsonResponse
    {
        return $service->getServices();
    }

    public function addSection(AddSectionRequest $request): JsonResponse
    {
        return Section::add($request->name);
    }
}
