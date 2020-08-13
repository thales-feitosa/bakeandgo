<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            //$table->date('created_at'); 
            $table->foreignId("user_id");
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('carrinho');

            $table->foreignId("produtos_id");
            $table->foreign('produtos_id')->references('id')->on('produtos');
            $table->string('user_endereco');
            // $table->foreign('user_endereco')->references('endereco')->on('users');
            $table->enum('status', ['RE', 'PA', 'CA']);
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
        Schema::dropIfExists('pedidos');
    }
}
