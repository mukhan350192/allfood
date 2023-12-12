<?php

namespace App\Http\v1\Services;

use App\Models\MenuItem;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class MenuService
{

    /**
     * @param int $section_id
     * @param string $name
     * @param string $description
     * @param $image
     * @param int $cafe_id
     * @param bool|null $status
     * @param array|null $data
     * @return JsonResponse
     */
    public function add(
        int $section_id,
        string $name,
        string $description,
        $image,
        int $cafe_id,
        float $price,
        bool|null $status,
        array|null $data
    ): JsonResponse
    {
        $path = $image->store('menu', 'public');

        $menu = MenuItem::add($section_id, $name, $description, $path, $cafe_id, $status, $price);
        if (!is_null($data) && count($data) > 0){
            $this->addSizes($data, $menu);
        }
        return response()->success([]);
    }


    public function addSizes(array $data, $itemID): void{
        foreach ($data as $size){
            DB::table('menu_item_sizes')->insert([
                'item_id' => $itemID,
                'size_name' => $size['size_name'],
                'price' => $size['price'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}


// Compare this snippet from app\Http\v1\Services\CityService.php:
