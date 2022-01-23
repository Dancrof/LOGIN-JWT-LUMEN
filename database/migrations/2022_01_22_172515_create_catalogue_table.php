<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogue', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            
            $table->id()->autoIncrement();
            $table->string('url_portada');
            $table->string('name')->unique();
            $table->string('Description')->default('description incompleto');
            $table->unsignedBigInteger('gender_fk');
            $table->foreign('gender_fk')->references('id')->on('gender')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('catalogue');
    }
}
