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
        factory(\App\Entity\SelectionQuestion::class, 6)->create();
    }
}
