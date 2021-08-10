<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId("car_id")->constrained("cars");
            $table->foreignId("customar_id")->constrained("customars");
            $table->integer("days");
            $table->string("book")->default("not confirm");
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
        Schema::dropIfExists('book_cars');
    }
}
