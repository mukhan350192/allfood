<?php

namespace App\Http\v1\Services;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function update(int $user_id, string $name, int $city_id, string $birthday)
    {
        User::query()->where('id', $user_id)->update([
            'name' => $name,
            'city_id' => $city_id,
            'birthday' => date('Y-m-d', strtotime($birthday)),
            'status' => 1,
        ]);
        return response()->success();
    }

    public function admin(string $name, string $phone, string $password): JsonResponse
    {
        $user = User::query()->create([
            'name' => $name,
            'phone' => $phone,
            'password' => bcrypt($password),
            'role' => 'admin',
        ]);

        if (!$user) {
            return response()->fail('Попробуйте позже');
        }
        $token = $user->createToken('api', ['admin'])->plainTextToken;
        return response()->success(['token' => $token]);
    }

    public function login(string $phone, string $password){
        $user = User::where('phone', $phone)->first();
        if (Hash::check($password, $user->password)) {
            $token = $user->createToken('api', ['admin'])->plainTextToken;
            return response()->success(['token' => $token]);
        }
        return response()->fail('Не совпадает логин и пароль');
    }
}
