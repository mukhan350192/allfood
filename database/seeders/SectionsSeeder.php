<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 5,
                'name' => 'Пицца',
                'name_kz' => 'Пицца',
                'icon' => '/upload/file_1602503980_326125982.png',
            ],
            [
                'id' => 6,
                'name' => 'Супы',
                'name_kz' => 'Сорпа',
                'icon' => '/upload/file_1602503991_86232956.png',
            ],
            [
                'id' => 7,
                'name' => 'Пекарня',
                'name_kz' => 'Наубайхана',
                'icon' => '/upload/file_1602504199_228887028.png',
            ],
            [
                'id' => 8,
                'name' => 'Продукты',
                'name_kz' => 'Азық-түлік',
                'icon' => '/upload/file_1602504018_507581434.png',
            ],
            [
                'id' => 9,
                'name' => 'Мороженое',
                'name_kz' => 'Балмұздақ',
                'icon' => '/upload/file_1602504023_215925673.png',
            ],
            [
                'id' => 10,
                'name' => 'Десерты',
                'name_kz' => 'Десерттер',
                'icon' => '/upload/file_1602504032_763659825.png'
            ],
            [
                'id' => 11,
                'name' => 'Бизнес ланч',
                'name_kz' => 'Бизнес ланч',
                'icon' => '/upload/file_1602504040_249288620.png',
            ],
            [
                'id' => 12,
                'name' => 'Морепродукты',
                'name_kz' => 'Теңіз өнімдері',
                'icon' => '/upload/file_1602504104_925004970.png',
            ],
            [
                'id' => 13,
                'name' => 'Паста',
                'name_kz' => 'Паста',
                'icon' => '/upload/file_1602504117_952169282.png',
            ],
            [
                'id' => 14,
                'name' => 'Хот дог',
                'name_kz' => 'Хот дог',
                'icon' => '/upload/file_1602504133_143281778.png',
            ],
            [
                'id' => 15,
                'name' => 'Бургеры',
                'name_kz' => 'Бургер',
                'icon' => '/upload/file_1602504138_602900276.png',
            ],
            [
                'id' => 16,
                'name'  => 'Горячие блюда',
                'name_kz' => 'Ыстық тағам',
                'icon' => '/upload/file_1602504160_511684060.png',
            ],
            [
                'id' => 17,
                'name' => 'Шашлыки',
                'name_kz' => 'Кәуап',
                'icon' => '/upload/file_1602504173_599887645.png',
            ],
            [
                'id' => 18,
                'name' => 'Донер',
                'name_kz' => 'Донер',
                'icon' => '/upload/file_1602504180_970127623.png',
            ],
            [
                'id' => 19,
                'name' => 'Суши',
                'name_kz' => 'Суши',
                'icon' => '/upload/file_1602504190_150113437.png',
            ],
            [
                'id' => 20,
                'name' => 'Заготовки',
                'name_kz' => 'Жартылай дайын өнім',
                'icon' => '/upload/file_1610531823_463564911.png',
            ],
            [
                'id' => 21,
                'name' => 'Чикен',
                'name_kz' => 'Тауық еті',
                'icon' => '/upload/file_1602789143_587854694.png',
            ],
            [
                'id' => 22,
                'name' => 'Кофе',
                'name_kz' => 'Кофе',
                'icon' => '/upload/file_1610455909_477944727.png',
            ],
            [
                'id' => 23,
                'name' => 'Ифтар',
                'name_kz' => 'Ифтар',
                'icon' => '/upload/file_1619182092_429886970.png',
            ]
        ];

        foreach ($data as $d){
            Section::create($d);
        }

    }
}
