<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $fillable = [
        "status", "user_id", "amount", "message", 
    ];

    const SUCCESS = 2;
    const PEDDING = 1;
    const NOT_SUMMIT = 0;

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

      public function order() 
    {
        return $this->hasMany(Order::class, 'transaction_id');
    }
}
