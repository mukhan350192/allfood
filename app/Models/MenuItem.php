<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'section_id',
        'price',
        'image',
        'cafe_id',
        'status'
    ];

    /**
     * @param int $section_id
     * @param string $name
     * @param string $description
     * @param $image
     * @param int $cafe_id
     * @param bool|null $status
     * @return int
     */

    public static function add(
        int $section_id,
        string $name,
        string $description,
        $image,
        int $cafe_id,
        bool|null $status,
        float $price
    ): int
    {
        $menuId = MenuItem::create([
            'section_id' => $section_id,
            'name' => $name,
            'description' => $description,
            'image' => $image,
            'cafe_id' => $cafe_id,
            'status' => $status ? $status : false,
            'price' => $price
        ]);
        return $menuId->id;
    }

    public function sizes()
    {
        return $this->hasMany(MenuItemSizes::class, 'item_id', 'id');
    }
}
