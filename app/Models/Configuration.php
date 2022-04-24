<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;
    protected $fillable = [
        'cofigame',
        'tp',
        'sl',
        'isStop',
        'isCompleted',
        'buy_unit',
        'rsi_buy',
        'rsi_sell',
        'new_trade_wait_time',
        'servername',
        'isStopLossHandle',
    ];
}
