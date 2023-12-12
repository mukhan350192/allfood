<?php

namespace App\Http\v1\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Http\v1\Services\MenuService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * @param MenuRequest $request
     * @return JsonResponse
     */
    public function addMenu(MenuRequest $request, MenuService $service): JsonResponse{
       return $service->add($request->section_id, $request->name, $request->description, $request->file('image'), $request->cafe_id,$request->price, $request->status,$request->data);
    }
}
