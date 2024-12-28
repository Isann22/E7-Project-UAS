<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Kolom id
            $table->unsignedBigInteger('order_id'); 
            $table->decimal('amount', 15, 2); 
            $table->string('snap_token', 255)->nullable(); 
            $table->string('payment_methode', 255)->nullable(); 
            $table->timestamps();

            // Menambahkan foreign key
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });

        Schema::dropIfExists('payments');
    }
}