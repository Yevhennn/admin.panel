<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            'Київ',
            'Харків',
            'Одеса',
            'Дніпро',
            'Запоріжжя',
            'Львів',
            'Кривий Ріг',
            'Миколаїв',
            'Маріуполь',
            'Вінниця',
            'Херсон',
            'Чернівці',
            'Полтава',
            'Черкаси',
            'Суми',
            'Житомир',
            'Ужгород',
            'Івано-Франківськ',
            'Тернопіль',
            'Луцьк',
        ];

        foreach ($cities as $city) {
            City::firstOrCreate(['city_name' => $city], ['city_name' => $city]);
        }
    }
}
