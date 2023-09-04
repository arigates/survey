<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyDetailUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_detail_users', function (Blueprint $table) {
            $table->unsignedBigInteger('survey_detail_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('survey_detail_id')->references('id')->on('survey_details');
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['survey_detail_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_detail_users');
    }
}
