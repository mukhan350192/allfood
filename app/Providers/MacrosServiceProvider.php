<?php

namespace App\Providers;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class MacrosServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        Response::macro('success', function (array $data = []): JsonResponse {
            return response()->json(array_merge($data, [
                'success' => true,
            ]));
        });

        Response::macro('fail', function (string $message, array $data = []): JsonResponse {
            return response()->json(array_merge($data, [
                'success' => false,
                'error' => $message,
            ]));
        });

    }
}
