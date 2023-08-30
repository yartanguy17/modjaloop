<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('account_sender_id')->unsigned();
            $table->foreign('account_sender_id')->references('id')->on('accounts');
            $table->integer('account_receiver_id')->unsigned();
            $table->foreign('account_receiver_id')->references('id')->on('accounts');
            $table->boolean('ledger_v')->default(false);
            $table->boolean('dfsp_v')->default(false);
            $table->integer('amount');
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
        Schema::dropIfExists('transactions');
    }
}
