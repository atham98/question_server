<?php

use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions_answers')->insert(
            [
                [
                    'question' => 'Что такое ООП ?',
                    'answer' => 'Объектно-ориентированное программирование методология программирования, основанная на представлении программы в виде совокупности объектов, каждый из которых является экземпляром определенного класса, а классы образуют иерархию наследования',
                    'author' => 'Adham',
                    'email' => '1998atham@gmail.com',
                    'category_id' => 1,
                    'boolean' => 1

                ],
                [
                    'question' => 'Что такое язык программи́рования ?',
                    'answer' => 'Язык программи́рования — формальный язык, предназначенный для записи компьютерных программ. Язык программирования определяет набор лексических, синтаксических и семантических правил, определяющих внешний вид программы и действия, которые выполнит исполнитель (обычно — ЭВМ) под её управлением.',
                    'author' => 'Дима',
                    'email' => '19vova@gmail.com',
                    'category_id' => 1,
                    'boolean' => 1
                ],
                [
                    'question' => 'Что такое Laravel ?',
                    'answer' => null,
                    'author' => 'Саня',
                    'email' => 'dima88@mail.com',
                    'category_id' => 1,
                    'boolean' => 0
                ]
            ]
        );
    }
}
