<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeaSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idea_submissions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('event_id');
            $table->integer('user_id');

            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('contact', 12);
            $table->string('standard', 10);
            $table->string('branch', 10);
            $table->string('collegename', 200);

            $table->string('name2', 100)->nullable();
            $table->string('email2', 100)->nullable();

            $table->string('name3', 100)->nullable();
            $table->string('email3', 100)->nullable();

            $table->string('name4', 100)->nullable();
            $table->string('email4', 100)->nullable();

            $table->text('title');
            $table->text('description');

            $table->string('category', 100);
            $table->string('domain', 100);
            $table->string('projectstatus', 100);

            $table->string('ideafile', 500)->nullable();

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
        Schema::dropIfExists('idea_submissions');
    }
}
