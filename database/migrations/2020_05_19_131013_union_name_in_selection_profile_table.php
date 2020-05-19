<?php

use Illuminate\Database\Migrations\Migration;

class UnionNameInSelectionProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::update('UPDATE `selection_profile` SET name = CONCAT(`surname`, " ", `name`, " ", `patronymic`);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
