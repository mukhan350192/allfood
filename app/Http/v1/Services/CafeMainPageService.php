<?php

namespace App\Http\v1\Services;

use App\Models\Cafe;
use App\Models\MenuItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class CafeMainPageService
{
    public function getCafes(int $city_id)
    {
        if (Redis::get('city_cafes_'.$city_id)){
            return json_decode(Redis::get('city_cafes_'.$city_id));
        }
        $data = Cafe::where('city_id', $city_id)->where('status', true)->where('online_status', true)->orderByDesc('rating')->get();
        Redis::set('city_cafes_'.$city_id,$data);
        return $data;
    }

    public function getCafeById(int $id)
    {
        $redisData = Redis::get('cafe_'.$id);
        if ($redisData){
            return json_decode($redisData);
        }
        $data['menu'] = MenuItem::with('sizes')->where('cafe_id',$id)->get();
        $data['sections'] = DB::table('menu_sections')->where('cafe_id',$id)->select('id','name')->get();

        //$data['items'] = DB::table('menu_items')->where('cafe_id',$id)->select(['id','name','price','section_id'])->get();
        Redis::set('cafe_'.$id,json_encode($data));
        return $data;
    }
}
