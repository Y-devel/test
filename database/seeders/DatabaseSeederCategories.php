<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeederCategories extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $arData = [
            [
                "name" => "Пильные центры с ЧПУ"
            ],
            [
                "name" => "Кромкооблицовочные станки"
            ],
            [
                "name" => "Сверлильно-присадочные станки с ЧПУ"
            ],
            [
                "name" => "Нестинг"
            ],
            [
                "name" => "Пристаночная автоматизация и механизация"
            ],
            [
                "name" => "Упаковка"
            ],
            [
                "name" => "Центральная аспирация"
            ],
            [
                "name" => "Отеделка"
            ],
        ];
        foreach ($arData as $item) {
            DB::table('categories')->insert([
                'name' => $item["name"]
            ]);
        }

    }
}
