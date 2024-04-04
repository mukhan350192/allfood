<?php

namespace App\Http\v1\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CafeByCityRequest;
use App\Http\v1\Services\CafeMainPageService;
use App\Http\v1\Services\CafeService;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redis;

class CafeController extends Controller
{
    public function getCity(Cafeservice $service)
    {
        return response()->success(['data' => $service->getCity()]);
    }

    public function getCafesByCity(CafeByCityRequest $request,CafeMainPageService $service){
        return response()->success(['data' => $service->getCafes($request->id)]);
    }

    public function getCafeById(CafeByCityRequest $request,CafeMainPageService $service){
        return response()->success(['data' => $service->getCafeById($request->id)]);
    }
}
