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
        Schema::create('googles', function (Blueprint $table) {
            $table->id();
            $table->text('analytics_link')->nullable();
            $table->text('analytics_script')->nullable();
            $table->text('search_script')->nullable();
            $table->text('tag_link')->nullable();
            $table->text('tag_script_head')->nullable();
            $table->text('tag_script_body')->nullable();
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
        Schema::dropIfExists('googles');
    }
};
