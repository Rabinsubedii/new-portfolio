<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('logo')->nulable();
            $table->string('copyrightinfo')->nullable();
            $table->string('emailaddress')->nullable();
            $table->string('phonenumber')->nullable();
            $table->string('post')->nullable();
            $table->text('homeimg')->nullable();
            $table->string('address')->nullable();
            $table->text('addressicon')->nullable();
            $table->text('phoneicon')->nullable();
            $table->text('emailicon')->nullable();
            $table->text('giticon')->nullable();
            $table->text('fbicon')->nullable();
            $table->text('instaicon')->nullable();
            $table->text('gitlink')->nullable();
            $table->text('instalink')->nullable();
            $table->text('fblink')->nullable();
            $table->text('map')->nullable();
            $table->integer('status')->nullable()->default(1);
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
        Schema::dropIfExists('settings');
    }
}
