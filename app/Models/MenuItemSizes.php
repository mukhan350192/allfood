<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItemSizes extends Model
{
    use HasFactory;
    protected $table = 'menu_item_sizes';
    protected $fillable = [
        'item_id',
        'size_name',
        'price'
    ];
}
