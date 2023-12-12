<?php

namespace App\Http\v1\Services;

use App\Models\Cafe;

class CafeMainPageService
{
    public function getCafes(int $city_id)
    {
        return Cafe::where('city_id', $city_id)->where('status', true)->where('online_status', true)->orderByDesc('rating')->get();
    }
}
