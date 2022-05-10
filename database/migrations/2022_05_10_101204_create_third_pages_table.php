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
            $table->string('title');
            $table->text('textarea');
            $table->string('img');
            $table->bigInteger('card_id')->unsigned();
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
