<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('third_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_az');
            $table->string('title_ru');
            $table->string('title_tr');
            $table->text('textarea_en');
            $table->text('textarea_az');
            $table->text('textarea_ru');
            $table->text('textarea_tr');
            $table->string('slug_en');
            $table->string('slug_az');
            $table->string('slug_ru');
            $table->string('slug_tr');
            $table->string('img');
            $table->bigInteger('card_id')->unsigned();
            $table->bigInteger('second_id')->unsigned();
            $table->bigInteger('panel_id')->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('third_pages');
    }
};
