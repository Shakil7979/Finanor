<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailySaving extends Model
{
    protected $fillable = ['user_id', 'date', 'amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
