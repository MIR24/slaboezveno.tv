<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnsweredAtToSelectionPassingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('selection_passing', function (Blueprint $table) {
            $table->timestamp('answered_at')->nullable();
            $table->timestamp('questions_started_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('selection_passing', function (Blueprint $table) {
            $table->removeColumn('answered_at');
            $table->removeColumn('questions_started_at');
        });
    }
}
