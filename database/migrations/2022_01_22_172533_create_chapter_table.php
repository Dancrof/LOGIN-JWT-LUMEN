<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('url_chapter')->unique();
            $table->unsignedBigInteger('calalogue_fk');
            $table->foreign('calalogue_fk')->references('id')->on('catalogue')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('chapter');
    }
}
