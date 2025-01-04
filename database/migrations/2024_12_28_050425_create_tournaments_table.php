<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 100);
            $table->dateTime('time'); 
            $table->unsignedBigInteger('venue_id'); 
            $table->unsignedBigInteger('user_id'); 
            
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            
            $table->text('description'); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::table('tournaments', function (Blueprint $table) {
            $table->dropForeign(['venue_id']);
            $table->dropForeign(['user_id']); 
        });

        Schema::dropIfExists('tournaments');
    }
}