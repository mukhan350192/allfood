<?php

namespace App\Http\v1\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CafeByCityRequest;
use App\Http\v1\Services\CafeMainPageService;
use App\Http\v1\Services\CafeService;
use App\Http\v1\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    public function getCity(Cafeservice $service): JsonResponse
    {
        return response()->success($service->getCity());
    }

    public function getCafesByCity(CafeByCityRequest $request,CafeMainPageService $service){
        return response()->success(['data' => $service->getCafes($request->id)]);
    }
}
