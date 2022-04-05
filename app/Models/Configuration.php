<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;
    protected $fillable = [
        'cofigame',
        'price',
        'tp',
        'sl',
        'isStop',
        'stopon',
        'isCompleted',
        'buy_unit',
        'exp_sl',
        'exp_tp',
        'rsi_buy',
        'rsi_sell',
        'new_trade_wait_time',
        'isStopLossHandle',
    ];
}
