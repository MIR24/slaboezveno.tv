<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectionProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selection_profile', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'fk_selection_profile_user_id')->references('id')->on('users');

            $table->string('surname');
            $table->string('name');
            $table->string('patronymic');
            $table->date('birthday');
            $table->string('country_of_residence');
            $table->string('city_of_residence');
            $table->string('contact_phone');
            $table->string('link_to_social_network');
            $table->string('link_to_video_card');
            $table->boolean('agree_to_processing_of_personal_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('selection_profile', function (Blueprint $table) {
            $table->dropForeign('fk_selection_profile_user_id');
        });
        Schema::dropIfExists('selection_profile');
    }
}
