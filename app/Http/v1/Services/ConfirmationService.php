<?php

namespace App\Http\v1\Services;

use App\Models\SMS;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ConfirmationService
{
    public function verify(string $phone, string $code)
    {
       /* $sms = SMS::query()->where('phone', $phone)
            ->where('code', $code)
            ->where('created_at', '>', Carbon::now()->subMinutes(10))
            ->latest()
            ->first();
        if (!$sms) {
            return response()->fail('Истек время кода');
        }*/
        $user = User::create([
            'phone' => $phone,
            'password' => bcrypt(Str::random(10)),
        ]);

        $token = $user->createToken('api',['client'])->plainTextToken;

        return response()->success(['token' => $token]);
    }
}
