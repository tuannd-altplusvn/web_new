<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $fillable = [
        "status", "user_id", "amount", "message", 
    ];

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}