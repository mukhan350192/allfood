<?php

namespace App\Http\v1\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\CafeByCityRequest;
use App\Http\Requests\CheckSMSRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SendSMSRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\v1\Services\CafeMainPageService;
use App\Http\v1\Services\CafeService;
use App\Http\v1\Services\ConfirmationService;
use App\Http\v1\Services\UserService;
use App\Models\SMS;
use App\Models\User;
use Illuminate\Http\JsonResponse;


class UserController extends Controller
{
    public function sendSMS(SendSMSRequest $request)
    {
        return SMS::send($request->phone);
    }

    public function verify(CheckSMSRequest $request, ConfirmationService $service)
    {
        return $service->verify($request->phone, $request->code);
    }

    public function update(UpdateUserRequest $request, UserService $service): JsonResponse
    {
        return $service->update(auth()->user()->id, $request->name, $request->city_id, $request->birthday);
    }

    public function create(AdminRequest $request, UserService $service): JsonResponse
    {
        return $service->admin($request->name, $request->phone, $request->password);
    }

    public function login(LoginRequest $request, UserService $service): JsonResponse
    {
        return $service->login($request->phone, $request->password);
    }
}
