<?php

use Illuminate\Database\Seeder;

class SelectionQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'question' => 'Как называется отец мужа?',
                'answer' => 'Свёкр',
            ],
            [
                'question' => 'Столица США?',
                'answer' => 'Вашингтон',
            ],
            [
                'question' => 'Что тяжелее  - гелий или воздух?',
                'answer' => 'Воздух',
            ],
            [
                'question' => 'Самая большая планета Солнечной системы?',
                'answer' => 'Юпитер',
            ],
            [
                'question' => 'Главным героем какого романа был Эдмон Дантес?',
                'answer' => 'Граф Монте-Кристо',
            ],
            [
                'question' => 'В какой стране прошли Олимпийские игры в 2016 году?',
                'answer' => 'Бразилия',
            ],
            [
                'question' => 'Какой элемент таблицы Менделеева обозначается латинской буквой N?',
                'answer' => 'Азот',
            ],
            [
                'question' => 'Какой герой, согласно мифам, убил Минотавра?',
                'answer' => 'Тесей',
            ],
            [
                'question' => 'Цефазолин - это витамин или антибиотик?',
                'answer' => 'Антибиотик',
            ],
            [
                'question' => 'Фамилия автора сказки «12 месяцев»?',
                'answer' => 'Маршак',
            ],
            [
                'question' => 'Прилетев из Москвы в Лондон нужно перевести стрелки часов на 3 часа вперед или назад?',
                'answer' => 'Назад',
            ],
            [
                'question' => 'Каким певческим голосом обладал оперный певец Дмитрий Хворостовский, тенор или баритон?',
                'answer' => 'Баритон',
            ],
            [
                'question' => 'В какой категории Мария Склодовская-Кюри получила Нобелевскую премию?',
                'answer' => 'Физика',
            ],
            [
                'question' => 'Как называлась первая серия космических кораблей в СССР?',
                'answer' => 'Восток',
            ],
            [
                'question' => '«Буря мглою небо кроет, вихри снежные крутя» - это ямб или хорей?',
                'answer' => 'Хорей',
            ]
        ];

        foreach($questions as $q) {
            factory(\App\Entity\SelectionQuestion::class)->create($q);
        }
    }
}
