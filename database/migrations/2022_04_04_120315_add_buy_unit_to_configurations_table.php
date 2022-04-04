<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configurations', function (Blueprint $table) {
            $table->decimal('buy_unit', 16,10);
            $table->decimal('exp_sl',16,10);
            $table->decimal('exp_tp',16,10);
            $table->integer('rsi_buy');
            $table->integer('rsi_sell');
            $table->integer('new_trade_wait_time');
            $table->tinyInteger('isStopLossHandle')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configurations', function (Blueprint $table) {
            $table->dropColumn('buy_unit');
            $table->dropColumn('exp_sl');
            $table->dropColumn('exp_tp');
            $table->dropColumn('rsi_buy');
            $table->dropColumn('rsi_sell');
            $table->dropColumn('new_trade_wait_time');
            $table->dropColumn('isStopLossHandle');
        });
    }
};
