<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eventname', 100);
            $table->string('when', 100);
            $table->string('where', 100);
            $table->text('shortdescription');
            $table->longText('description');

            $table->tinyInteger('registration')->default('0');
            $table->tinyInteger('participation')->default('0');

            $table->tinyInteger('status')->default('0');

            $table->string('eventvideo', 500)->default('https://www.youtube.com/watch?v=wBM2V58mcNM');
            $table->string('eventphoto', 300)->nullable();
            $table->string('eventfile', 500)->nullable();

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
        Schema::dropIfExists('events');
    }
}
