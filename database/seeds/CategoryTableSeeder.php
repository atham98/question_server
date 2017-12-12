<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                ['name' => 'Программирование'],
                ['name' => 'Города и страны'],
                ['name' => 'Образование'],
                ['name' => 'Еда и Кулинария'],
                ['name' => 'Наука и Техника'],
                ['name' => 'Спорт'],
                ['name' => 'Красота и Здоровье'],
                ['name' => 'Животные и Растение'],
                ['name' => 'Бизнес и Финансы'],
                ['name' => 'Работа и Корьера'],
                ['name' => 'Семья и Дети'],
                ['name' => 'Юмор'],
                ['name' => 'Товары и услуги'],
                ['name' => 'Авто'],
                ['name' => 'Развлечения'],
                ['name' => 'Политика и СМИ'],
                ['name' => 'Путишествия и Туризм'],
                ['name' => 'Телефоны'],
                ['name' => 'Компьютеры'],
                ['name' => 'Другие'],

            ]
        );
    }
}
