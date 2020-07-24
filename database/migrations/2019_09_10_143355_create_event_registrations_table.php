<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->integer('user_id');

            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('contact', 12);

            $table->string('standard', 10);
            $table->string('branch', 10);
            $table->string('collegename', 200);

            $table->text('comment');

            $table->tinyInteger('status')->default('0');

            $table->tinyInteger('status1')->default('0');

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
        Schema::dropIfExists('event_registrations');
    }
}
