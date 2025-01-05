<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ticket_id');
            $table->integer('qty');
            $table->decimal('amount', 15, 2)->nullable();
            $table->enum('status', ['pending', 'completed', 'canceled']);
            $table->timestamps();

            // Menambahkan foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Pastikan tabel users ada
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade'); // Pastikan tabel tickets ada
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['ticket_id']);
        });

        Schema::dropIfExists('orders');
    }
}
