<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class SMS extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'phone',
        'code',
    ];

    /**
     * @param string $phone
     * @return JsonResponse
     */

    public static function send(string $phone)
    {
        $code = rand(1000, 9999);
        $sms = SMS::create([
            'code' => $code,
            'phone' => $phone
        ]);
        if (!$sms) {
            return response()->fail('Попробуйте позже');
        }
        return response()->success([]);
    }
}
